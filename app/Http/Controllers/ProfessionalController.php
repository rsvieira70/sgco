<?php

namespace App\Http\Controllers;

use App\Class\Useful;
use App\Class\ImageExtension;
use App\Class\NumberFormat;
use App\Models\Council;
use App\Models\Patent;
use App\Models\Professional;
use App\Models\ProfessionalCertificate;
use App\Models\ProfessionalDocument;
use App\Models\ProfessionalPaymentInformation;
use App\Models\Specialty;
use App\Models\State;
use App\Models\User;
use App\Notifications\SystemErrorAlert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProfessionalRequest;

class ProfessionalController extends Controller
{
    public function index()
    {
        $title =  __('List of professionals');
        $userAuth = Auth()->User();
        $professionals = Professional::orderBy('name', 'asc')->get();
        return view('professionals.index', compact('title', 'userAuth', 'professionals'));
    }

    public function create()
    {
        $title =  __('New professional registration');
        $userAuth = Auth()->User();
        $states = State::orderBy('description', 'asc')->get();
        $specialties = Specialty::orderBy('description', 'asc')->get();
        $councils = Council::orderBy('name', 'asc')->get();
        $patents = Patent::orderBy('name', 'asc')->get();
        return view('professionals.create', compact('title', 'userAuth', 'states', 'specialties', 'councils', 'patents'));
    }

    public function store(ProfessionalRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameImage = "{$name}.{$extension}";
            $data['image'] = $nameImage;
            $upload = $request->image->storeAs('professionals', $nameImage);

            if (!$upload) {
                Alert::alert()->error(__('Opps! An internal error occurred.'), __('An error occured while uploading the file.'))
                    ->footer(__("An unexpected error occurred and we have notified our support team. Please try again later."))
                    ->showConfirmButton(__('Ok'), '#d33');
                return redirect()->back()->withInput();
            }
        }

        db::beginTransaction();
        try {
            Professional::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('Professional') . __(' successfully added!'));
            return redirect()->route('professionals.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' ' . __('professional');
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('professionals.index');
        }
    }

    public function show($id)
    {
        $professional = Professional::with(['Tenant', 'Patent', 'Specialty', 'Council', 'State'])->find($id);
        if ($professional) {
            $professional->social_security_number = Useful::class::ssn($professional->social_security_number);
            $professional->zip_code = Useful::class::zip_code($professional->zip_code);
            $professional->telephone = Useful::class::phone($professional->telephone);
            $professional->cell_phone = Useful::class::phone($professional->cell_phone);
            $professional->whatsapp = Useful::class::phone($professional->whatsapp);
            $professional->telegram = Useful::class::phone($professional->telegram);
            $professionalDocuments =  ProfessionalDocument::whereIn('professional_id', [$id])->get();
            foreach ($professionalDocuments as $professionalDocument){
                $professionalDocument->document_type = ImageExtension::class::imageextesion($professionalDocument->document_type);
            }
            $professionalCertificates =  ProfessionalCertificate::whereIn('professional_id', [$id])->get();
            foreach ($professionalCertificates as $professionalCertificate){
                $professionalCertificate->document_type = ImageExtension::class::imageextesion($professionalCertificate->document_type);
            }
            $title =  __('Professional show');
            $userAuth = Auth()->User();
            $professionalPaymentInformation = ProfessionalPaymentInformation::find($id);
            if ($professionalPaymentInformation) {
                switch ($professionalPaymentInformation->maintenance_payment_type) {
                    case 0:
                        $professionalPaymentInformation->maintenance_payment_type = __('not applicable');
                        break;
                    case 1:
                        $professionalPaymentInformation->maintenance_payment_type = __('Fixed amount on the amount of maintenance received');
                        break;
                    case 2:
                        $professionalPaymentInformation->maintenance_payment_type = __('Percentage of maintenance received');
                        break;
                }
                $professionalPaymentInformation->maintenance_payment_amount = NumberFormat::class::insertNumberFormat($professionalPaymentInformation->maintenance_payment_amount);;
                switch ($professionalPaymentInformation->clinical_payment_type) {
                    case 0:
                        $professionalPaymentInformation->clinical_payment_type = __('not applicable');
                        break;
                    case 1:
                        $professionalPaymentInformation->clinical_payment_type = __('Fixed amount on the amount of maintenance received');
                        break;
                    case 2:
                        $professionalPaymentInformation->clinical_payment_type = __('Percentage of maintenance received');
                        break;
                }
                $professionalPaymentInformation->clinical_payment_amount = NumberFormat::class::insertNumberFormat($professionalPaymentInformation->clinical_payment_amount);;
                $professionalPaymentInformation->fixed_value = NumberFormat::class::insertNumberFormat($professionalPaymentInformation->fixed_value);;
                switch ($professionalPaymentInformation->pix_key_type) {
                    case 0:
                        $professionalPaymentInformation->pix_key_type = __('not applicable');
                        break;
                    case 1:
                        $professionalPaymentInformation->pix_key_type = __('Social security number');
                        break;
                    case 2:
                        $professionalPaymentInformation->pix_key_type = __('Employer identification number');
                        break;
                    case 3:
                        $professionalPaymentInformation->pix_key_type = __('Cell phone');
                        break;
                    case 4:
                        $professionalPaymentInformation->pix_key_type = __('email');
                        break;
                    case 5:
                        $professionalPaymentInformation->pix_key_type = __('Random');
                        break;
                }
            }
            return view('professionals.show', compact('title', 'userAuth', 'professional', 'professionalPaymentInformation', 'professionalDocuments', 'professionalCertificates'));
        }
        return redirect()->route('tenants.index');
    }

    public function edit($id)
    {
        $professional = Professional::find($id);
        if ($professional) {
            $title =  __('Professional update');
            $userAuth = Auth()->User();
            $states = State::orderBy('description', 'asc')->get();
            $specialties = Specialty::orderBy('description', 'asc')->get();
            $councils = Council::orderBy('name', 'asc')->get();
            $patents = Patent::orderBy('name', 'asc')->get();
            return view('professionals.edit', compact('title', 'userAuth', 'professional', 'states', 'specialties', 'councils', 'patents'));
        }
        return redirect()->route('professionals.index');
    }

    public function update(ProfessionalRequest $request, $id)
    {
        $data = $request->validated();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameImage = "{$name}.{$extension}";
            $data['image'] = $nameImage;
            $upload = $request->image->storeAs('professionals', $nameImage);

            if (!$upload) {
                Alert::alert()->error(__('Opps! An internal error occurred.'), __('An error occured while uploading the file.'))
                    ->footer(__("An unexpected error occurred and we have notified our support team. Please try again later."))
                    ->showConfirmButton(__('Ok'), '#d33');
                return redirect()->back()->withInput();
            }
        }
        if (!$request->get('make_clinical_budget')) {
            $data['make_clinical_budget'] = null;
        }
        if (!$request->get('responsible_dentist')) {
            $data['responsible_dentist'] = null;
        }
        db::beginTransaction();
        try {
            $professional = Professional::find($id);

            $professional->patent_id = $data['patent_id'];
            $professional->name = $data['name'];
            $professional->social_name = $data['social_name'];
            $professional->nickname = $data['nickname'];
            $professional->social_security_number = $data['social_security_number'];
            $professional->specialty_id = $data['specialty_id'];
            $professional->council_id = $data['council_id'];
            $professional->council_number = $data['council_number'];
            $professional->council_state_id = $data['council_state_id'];
            $professional->birth = $data['birth'];
            if (!empty($data['image'])) {
                if ($professional->image) {
                    $image_old = "storage/tenants/{$professional->Tenant->uuid}/professionals/{$professional->image}";
                    if (File::exists($image_old)) {
                        File::delete($image_old);
                    }
                }
                $professional->image = $data['image'];
            };
            $professional->zip_code = $data['zip_code'];
            $professional->address = $data['address'];
            $professional->house_number = $data['house_number'];
            $professional->complement = $data['complement'];
            $professional->neighborhood = $data['neighborhood'];
            $professional->city = $data['city'];
            $professional->state = $data['state'];
            $professional->dceu = $data['dceu'];
            $professional->telephone = $data['telephone'];
            $professional->cell_phone = $data['cell_phone'];
            $professional->whatsapp = $data['whatsapp'];
            $professional->telegram = $data['telegram'];
            $professional->facebook = $data['facebook'];
            $professional->instagram = $data['instagram'];
            $professional->twitter = $data['twitter'];
            $professional->linkedin = $data['linkedin'];
            $professional->registration_date = $data['registration_date'];
            $professional->make_clinical_budget = $data['make_clinical_budget'];
            $professional->responsible_dentist = $data['responsible_dentist'];
            $professional->note = $data['note'];
            $professional->website = $data['website'];
            $professional->email = $data['email'];

            $professional->save();
            db::commit();
            Alert::alert()->success(__('Changed'), __('Professional') . __(' successfully changed!'));
            return redirect()->route('professionals.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' ' . __('professional') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('professionals.index');
        }
    }

    public function suspend($id)
    {
        db::beginTransaction();
        try {
            $professional = Professional::find($id);
            if ($professional->suspension_date == null) {
                $professional->suspension_date = now();
            } else {
                $professional->suspension_date = null;
            }
            $professional->save();
            db::commit();
            if ($professional->suspension_date == null) {
                Alert::alert()->success(__('Reactivated'), __('Professional') . __(' successfully reactivated!'));
            } else {
                Alert::alert()->success(__('Suspended'), __('Professional') . __(' successfully suspended!'));
            }
            return redirect()->route('professionals.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' ' . __('professional') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('professionals.index');
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $professional = Professional::findOrFail($id);
            if ($professional) {
                $professional->delete();
                db::commit();
                Alert::alert()->success(__('Excluded'), __('Professional') . __(' successfully deleted!'));
                return redirect()->route('professionals.index');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' ' . __('professional') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('professionals.index');
        }
    }
}
