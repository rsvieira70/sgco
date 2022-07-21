<?php

namespace App\Http\Controllers;


use App\Class\ImageExtension;
use App\Http\Requests\TenantDocumentRequest;
use App\Models\Tenant;
use App\Models\TenantDocument;
use App\Notifications\SystemErrorAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class TenantDocumentController extends Controller
{
    public function index()
    {
        $title =  __('List of tenant documents');
        $userAuth = Auth()->User();
        $tenant = Tenant::whereIn('id', [$userAuth->id])->get()->first();
        $tenantDocuments = TenantDocument::orderBy('description', 'asc')->get();
        foreach ($tenantDocuments as $tenantDocument){
            $tenantDocument->document_type = ImageExtension::class::imageextesion($tenantDocument->document_type);
        }
    return view('tenantDocuments.index', compact('title', 'userAuth', 'tenant', 'tenantDocuments'));
    }

    public function create()
    {
        $title =  __('New document registration');
        $userAuth = Auth()->User();
        $tenant = Tenant::whereIn('id', [$userAuth->id])->get()->first();
        return view('tenantDocuments.create', compact('title', 'userAuth', 'tenant'));
    }

    public function store(TenantDocumentRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('document') && $request->file('document')->isValid()) {
            $name = 'document';
            $extension = $request->document->extension();
            $nameDocument = "{$name}.{$extension}";
            $data['document'] = $nameDocument;
            $data['document_type'] = $extension;
            $upload = $request->document->storeAs('tenant/documents', $nameDocument);

            if (!$upload) {
                Alert::alert()->error(__('Opps! An internal error occurred.'), __('An error occured while uploading the file.'))
                    ->footer(__("An unexpected error occurred and we have notified our support team. Please try again later."))
                    ->showConfirmButton(__('Ok'), '#d33');
                return redirect()->back()->withInput();
            }
        }

        db::beginTransaction();
        try {
            TenantDocument::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('Document') . __(' successfully added!'));
            return redirect()->route('tenantDocuments.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' ' . __('Document');
            $users = TenantDocument::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('tenantDocuments.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
