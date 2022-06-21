<?php

namespace App\Http\Controllers;

use App\Models\TenantDocument;
use Illuminate\Http\Request;

class TenantDocumentController extends Controller
{
    public function index()
    {
        $title =  __('List of documents');
        $userAuth = Auth()->User();
        $tenantDocuments = TenantDocument::orderBy('description', 'asc')->get();
        return view('tenantDocuments.index', compact('title', 'userAuth', 'tenantDocuments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
