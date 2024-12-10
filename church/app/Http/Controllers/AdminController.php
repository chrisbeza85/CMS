<?php

namespace App\Http\Controllers;

use App\Models\Givings;

use Illuminate\Http\Request;

use App\Models\Members;

use App\Models\User;

use App\Models\Inventory;

use App\Models\Schedule;

use App\Models\StrategicPlan;

use App\Models\HumanResource;

use App\Models\Event;

//Inventory
use App\Models\OwnedItem;

use App\Models\Supplier;

use App\Models\Customer;

use App\Models\Donor;

use App\Models\DonatedTo;

use App\Models\EquipmentCategory;

use App\Models\EquipmentSubcategory;

use App\Models\Department;

use OwenIt\Auditing\Models\Audit;
//

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;
class AdminController extends Controller
{
    public function view_members()
    {
        return view('admin.members');
    }

    public function time_management()
    {
        return view('admin.time_management');
    }

    public function view_givings()
    {
        return view('admin.givings');
    }

    public function add_strategicplan()
    {
        return view('admin.strategicplan');
    }

    public function add_employee()
    {
        return view('admin.addemployee');
    }

    public function see_members()
    {

        $data = members::all();

        $memberCount = members::count(); // Count the number of members

        return view('admin.seemember', compact('data', 'memberCount'));
    }


    public function see_givings()
    {
        $givings = Givings::all();
        $givingCount = Givings::count(); // Count the number of givings

        return view('admin.seegivings', compact('givings', 'givingCount'));
    }

    public function see_users()
    {
        $users = User::all();
        $userCount = User::count(); // Count the number of users

        return view('admin.seeusers', compact('users', 'userCount'));
    }

    public function add_members(Request $request)
    {
        $data = new members;
        $data->fname = $request->fname;
        $data->mname = $request->mname;
        $data->lname = $request->lname;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->occupation = $request->occupation;
        $data->registeras = $request->registeras;
        $data->registrationdate = $request->registrationdate;
        $data->gender = $request->gender;
        $data->birthday = $request->birthday;
        $data->ministry = $request->ministry;
        $data->marital = $request->marital;
        $data->save();

        return redirect()->back()->with('message', 'Member Added Successfully');
    }
    public function add_givings(Request $request)
    {

        $givings = new Givings;
        $givings->fname = $request->fname;
        $givings->mname = $request->mname;
        $givings->lname = $request->lname;
        $givings->giving = $request->giving;
        $givings->amount = $request->amount;
        $givings->mobile = $request->mobile;
        $givings->comment = $request->comment;
        $givings->save();

        return redirect()->back()->with('message', 'Giving Received Successfully');
    }
    
    public function create_strategicplan(Request $request)
    {

        $strategicplans = new strategicplan;
        $strategicplans->name = $request->name;
        $strategicplans->theme = $request->theme;
        $strategicplans->description = $request->description;
        $strategicplans->startyear = $request->startyear;
        $strategicplans->finishyear = $request->finishyear;
        $strategicplans->save();

        return redirect()->back()->with('message', 'Strategic Plan Created Successfully');
    }

    public function create_employee(Request $request)
    {

        $human_resource = new HumanResource;
        $human_resource->fname = $request->fname;
        $human_resource->mname = $request->mname;
        $human_resource->lname = $request->lname;
        $human_resource->email = $request->email;
        $human_resource->address = $request->address;
        $human_resource->mobile = $request->mobile;
        $human_resource->occupation = $request->occupation;
        $human_resource->pay = $request->pay;
        $human_resource->registrationdate = $request->registrationdate;
        $human_resource->gender = $request->gender;
        $human_resource->birthday = $request->birthday;
        $human_resource->ministry = $request->ministry;
        $human_resource->status = $request->status;
        $human_resource->marital = $request->marital;
        $human_resource->save();

        return redirect()->back()->with('message', 'Employee Added Successfully');
    }

    public function delete_members($id)
    {
        $data = members::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Member Deleted Successfully');
    }

    public function delete_givers($id)
    {
        $givings = Givings::find($id);
        $givings->delete();
        return redirect()->back()->with('message', 'Giving Deleted Successfully');
    }

    public function delete_users($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->back()->with('message', 'User Deleted Successfully');
    }

    //SUPPLIERS
    public function view_inventory()
    {
        $suppliers = Supplier::all();
        return view('admin.inventory', compact('suppliers'));
    }

    public function inventory()
    {
        $suppliers = Supplier::all();
        return view('admin.inventory', compact('suppliers'));
    }
    
    public function weekly_schedule()
    {
        $schedule = Schedule::all();
        return view('admin.weekly_schedule', compact('schedule'));
    }

    public function insert_schedule()
    {
        $schedule = Schedule::all();
        return view('admin.add_schedule', compact('schedule'));
    }

    public function insert_event()
    {
        $event = Event::all();
        $hours = range(0, 23); 
        $minutes = range(0, 59); 
        return view('admin.addevent', compact('event', 'hours', 'minutes'));
    }

    public function add_inventory(Request $request)
    {

        $inventory = new Inventory;
        $inventory->title = $request->title;
        $inventory->description = $request->description;
        $inventory->price = $request->price;
        $inventory->quantity = $request->quantity;
        $inventory->category = $request->category;
        $inventory->condition = $request->condition;
        $inventory->serial_number = $request->serial_number;
        $inventory->purchase_date = $request->purchase_date;
        $inventory->qr_code = $request->qr_code;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('inventory', $imagename);
        $inventory->image = $imagename;
        $inventory->save();

        return redirect()->back()->with('message', 'Equipment Added Successfully');
    }

    public function add_event(Request $request)
    {

        $event = new Event;
        $event->name = $request->name;
        $event->details = $request->details;
        $event->countdown_hours = $request->countdown_hours;
        $event->countdown_minutes = $request->countdown_minutes;
        $event->countdown_seconds = $request->countdown_minutes;
        $event->added_by = $request->added_by;
        $event->save();

        return redirect()->back()->with('message', 'Event Added Successfully');
    }

    //INVENTORY
    public function show_inventory()
    {
        $ownedItemsGrouped = OwnedItem::select('item_name', \DB::raw('COUNT(*) as quantity'))
                                        ->groupBy('item_name')
                                        ->get();

        return view('admin.show_inventory', compact('ownedItemsGrouped'));
    }

    public function show_suppliers()
    {
        $suppliers = Supplier::all();
        return view('admin.show_suppliers', compact('suppliers'));
    }

    public function show_customers()
    {
        $customers = Customer::all();
        return view('admin.show_customers', compact('customers'));
    }

    public function show_donors()
    {
        $donors = Donor::all();
        return view('admin.show_donors', compact('donors'));
    }

    public function show_recipients()
    {
        $donatedTos = DonatedTo::all();
        return view('admin.show_recipients', compact('donatedTos'));
    }

    public function show_categories()
    {
        $categories =EquipmentCategory::with('subcategories')->get();
        return view('admin.show_categories', compact('categories'));
    }

    public function show_departments()
    {
        $departments = Department::all();
        return view('admin.show_departments', compact('departments'));
    }

    public function show_barcode(Request $request)
    {
        return view('admin.show_barcode');
    }

    public function show_qrcode(Request $request)
    {
        return view('admin.show_qrcode');
    }

    public function show_report(Request $request)
    {
        $audits = Audit::query();
    
        if ($request->has('model_type')) {
            $audits->where('auditable_type', $request->get('model_type'));
        }
    
        if ($request->has('event')) {
            $audits->where('event', $request->get('event'));
        }
    
        $audits = $audits->latest()->get();
    
        return view('admin.show_report', compact('audits'));
    }

    public function show_dashboard(Request $request)
    {
        // Fetch the required data
        $todayUpdates = OwnedItem::whereDate('created_at', now()->toDateString())->count();
        $recentUpdates = OwnedItem::latest()->take(5)->get();
        $poorConditionCount = OwnedItem::where('item_condition', 'poor')->count();
        $lostItemsCount = OwnedItem::where('status', 'lost')->count();
        $damagedItemsCount = OwnedItem::where('status', 'damaged')->count();
        $totalItems = OwnedItem::count();

        // Data for bar graph
        $barGraphData = [
            'poor' => $poorConditionCount,
            'lost' => $lostItemsCount,
            'damaged' => $damagedItemsCount,
        ];

        // Pass the data to the view
        return view('admin.show_dashboard', compact(
            'todayUpdates',
            'recentUpdates',
            'poorConditionCount',
            'lostItemsCount',
            'damagedItemsCount',
            'totalItems',
            'barGraphData'
        ));
    }

    public function delete_inventory($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->back()->with('message', 'Equipment Deleted Successfully');
    }

    
    public function add_schedule(Request $request)
    {

        $schedule = new Schedule;
        $schedule->date = $request->date;
        $schedule->theme = $request->theme;
        $schedule->elder_on_duty_1 = $request->elder_on_duty_1;
        $schedule->elder_on_duty_2 = $request->elder_on_duty_2;
        $schedule->save();
        return redirect()->back()->with('message', 'Schedule Added Successfully');
    }

  // In ScheduleController.php
public function view_schedule($id)
{
    $item = Schedule::findOrFail($id);
    return view('admin.view_schedule', compact('item'));
}

    public function delete_schedule($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->back()->with('message', 'Equipment Deleted Successfully');
    }


    public function update_member($id)
    {

        $data = members::find($id);
        return view('admin.updatemember', compact('data'));
    }

    public function update_registered(Request $request, $id)
    {
        $data = Members::find($id);

        $data->fname = $request->fname;

        $data->mname = $request->mname;

        $data->lname = $request->lname;

        $data->email = $request->email;

        $data->address = $request->address;

        $data->mobile = $request->mobile;

        $data->ministry = $request->ministry;

        $data->registeras = $request->registeras;

        $data->registrationdate = $request->registrationdate;

        $data->gender = $request->gender;

        $data->birthday = $request->birthday;

        $data->marital = $request->marital;

        $data->save();

        return redirect()->back()->with('message', 'Member Updated Successfully');
    }

    public function update_user($id)
    {

        $users = User::find($id);
        return view('admin.updateuser', compact('users'));
    }

    public function update_users(Request $request, $id)
    {
        $users = User::find($id);

        $users->name = $request->name;

        $users->email = $request->email;

        $users->gender = $request->gender;

        $users->email = $request->email;

        $users->birthday = $request->birthday;

        $users->address = $request->address;

        $users->save();

        return redirect()->back()->with('message', 'User Updated Successfully');
    }



    public function update_inventory($id)
    {

        $inventory = Inventory::find($id);
        return view('admin.update_inventory', compact('inventory'));
    }

    public function update_equipment(Request $request, $id)
    {
        $inventory = Inventory::find($id);

        $inventory->title = $request->title;

        $inventory->description = $request->description;

        $inventory->price = $request->price;

        $inventory->quantity = $request->quantity;

        $inventory->category = $request->category;

        $inventory->condition = $request->condition;

        $inventory->serial_number = $request->serial_number;

        $inventory->qr_code = $request->qr_code;

        $inventory->purchase_date = $request->purchase_date;

        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('inventory', $imagename);

            $inventory->image = $imagename;
        }

        $inventory->save();

        return redirect()->back()->with('message', 'Equipment Updated Successfully');
    }

}


