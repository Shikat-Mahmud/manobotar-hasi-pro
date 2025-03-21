<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Event;
use App\Models\EventRegister;
use App\Models\Invest;
use App\Models\Review;
use App\Models\Sponsor;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Schema;



class IndexController extends Controller
{

    public function index()
    {
        if (auth()->user()->can('admin-panel')) {
            $totalUsers = User::count();
            $registrations = EventRegister::latest()->limit(5)->get();
            $totalRegistration = EventRegister::count();
            $totalPayment = EventRegister::where('status', 1)->count();

            $totalExStudent = EventRegister::whereBetween('batch', [2000, 2023])->count();
            $totalPresentStudent = EventRegister::whereBetween('batch', [2024, 2026])->count();
            $totalStudent = $totalExStudent + $totalPresentStudent;

            $totalTeachers = EventRegister::whereNull('batch')->where(function ($query) {
                $query->where('suggestion', '!=', 'staff')
                    ->orWhereNull('suggestion');
            })->count();
            $totalStaffs = EventRegister::whereNull('batch')->where('suggestion', 'staff')->count();

            $totalGuest = EventRegister::sum('guest');
            $totalAttendee = $totalRegistration + $totalGuest;

            $totalRegAmount = EventRegister::where('status', 1)->sum('amount');
            $totalRegAmountExStd = EventRegister::where('status', 1)
                ->whereNotNull('batch')
                ->whereBetween('batch', [2000, 2023])
                ->sum('amount');
            $totalRegAmountCurStd = EventRegister::where('status', 1)
                ->whereNotNull('batch')
                ->whereBetween('batch', [2024, 2026])
                ->sum('amount');

            $totalDonAmount = Donation::sum('amount');
            $totalSponAmount = Sponsor::sum('amount');
            $totalAmountReceived = $totalRegAmount + $totalDonAmount + $totalSponAmount;
            $totalInvestment = Invest::sum('amount');
            $totalInHand = $totalAmountReceived - $totalInvestment;

            // PAID COUNT START

            $totalPaidExStd = EventRegister::where('status', 1)
                ->whereNotNull('batch')
                ->whereBetween('batch', [2000, 2023])
                ->count();
            $totalPaidPreStd = EventRegister::where('status', 1)
                ->whereNotNull('batch')
                ->whereBetween('batch', [2024, 2026])
                ->count();
            $totalPaidTchr = EventRegister::where('status', 1)
                ->whereNull('batch')
                ->whereNull('suggestion')
                ->count();
            $totalPaidStf = EventRegister::where('status', 1)
                ->whereNull('batch')
                ->where('suggestion', 'LIKE', '%staff%')
                ->count();
            $totalPaidGst = EventRegister::where('status', 1)
                ->sum('guest');

            // PAID COUNT END

            $event = Event::first();
            $totalReviewrs = Review::count();
            $totalTeamMembers = Team::count();

            return view('admin.main.index', compact('registrations', 'totalRegistration', 'totalPayment', 'event', 'totalReviewrs', 'totalTeamMembers', 'totalStudent', 'totalTeachers', 'totalStaffs', 'totalExStudent', 'totalPresentStudent', 'totalGuest', 'totalAttendee', 'totalRegAmount', 'totalRegAmountExStd', 'totalRegAmountCurStd', 'totalDonAmount', 'totalSponAmount', 'totalAmountReceived', 'totalInvestment', 'totalInHand', 'totalPaidExStd', 'totalPaidPreStd', 'totalPaidTchr', 'totalPaidStf', 'totalPaidGst'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to go to admin panel.');
        }
    }

    public function login()
    {
        $general = generalSettings();
        return view('admin.main.users.admin_login', compact('general'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $models = [
            'User' => User::class,
            'EventRegister' => EventRegister::class,
            'Donation' => Donation::class,
            'Sponsor' => Sponsor::class,
            'Invest' => Invest::class,
            'Event' => Event::class,
            'Review' => Review::class,
            'Team' => Team::class
        ];

        $results = [];

        foreach ($models as $modelName => $model) {
            // Get the table name for the model
            $table = (new $model)->getTable();

            // Get the columns for the model's table
            $columns = Schema::getColumnListing($table);

            // Build the query for each model
            $modelQuery = $model::query();

            foreach ($columns as $column) {
                $modelQuery->orWhere($column, 'LIKE', "%{$query}%");
            }

            // Get the results
            $modelResults = $modelQuery->get();

            // Add model name to each result and skip unwanted columns
            foreach ($modelResults as $result) {
                $filteredResult = $result->toArray();
                unset($filteredResult['id'], $filteredResult['created_at'], $filteredResult['updated_at']);
                $filteredResult['model'] = $modelName;
                $results[] = $filteredResult;
            }
        }

        // Return JSON response
        return response()->json($results);
    }
}
