<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;
use App\Models\Company;
use DataTables;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/company/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout,dashboard']);
    }

    public function getLogin()
    {
        return view('auth.company.login');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(LoginRequest $request)
    {
        if (auth()->guard('company')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'status' => 1])) {
            $user = auth()->guard('company')->user();

            return redirect()->route("companyDashboard")
                ->with('success', 'You are Login successfully!!');
        } else {
            return redirect()->route("companyLogin")
                ->with('error', 'your username and password are wrong or account is deactivated.');
        }
    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('company')->logout();
        Session::flush();
        // Session::put('success','You are logout successfully');        
        return redirect()->route('companyLogin');
    }

    public function dashboard()
    {
        return view('company.dashboard');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Company::select('id', 'name', 'email', 'status')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return
                        '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-primary btn-sm status">' . ($row->status == 1 ? "Active" : "Inactive") . '</a>';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('viewCompany', base64_encode($row->id)) . '" class="btn btn-info btn-sm mr-1"><i class="fa-solid fa-eye"></i></a>';
                    $btn .= '<a href="' . route('editCompany', base64_encode($row->id)) . '" class="btn btn-primary btn-sm  mr-1 "><i class="fa-solid fa-pen-to-square"></i></a>';
                    $btn .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm delete"><i class="fa-solid fa-trash"></i></a>';
                    return $btn;
                })

                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        // Load index view
        return view('company.index');
    }



    public function changeStatus(Request $request)
    {
        $company = Company::find($request->id);
        $company->status = ($company->status == 1 ? 0 : 1);
        $company->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        $company = new Company;

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->password = hash::make($request->password);
        $path = storage_path('images/');
        !is_dir($path) &&
            mkdir($path, 0777, true);
        if ($file = $request->file('logo')) {
            $fileName   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName, File::get($file));
            $company->logo = !empty($fileName) ? $fileName : "";
        }
        $company->save();


        return redirect()->route('companyList')
            ->with('success', 'Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find(base64_decode($id));
        return view('company.view', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find(base64_decode($id));
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request)
    {

        $company = Company::find($request->id);

        $company->name = $request->name;
        $company->website = $request->website;
        $path = storage_path('images/');
        !is_dir($path) &&
            mkdir($path, 0777, true);
        if ($file = $request->file('logo')) {
            Storage::delete($company->logo);
            $fileName   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName, File::get($file));
            $company->logo = !empty($fileName) ? $fileName : "";
        }
        $company->save();

        return redirect()->route('companyList')
            ->with('success', 'Company has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Company::where('id', $request->id)->delete();
        return response()->json(['success' => 'Copmany has been deleted successfully.']);
    }
}
