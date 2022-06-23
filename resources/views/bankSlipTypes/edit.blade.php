@extends('_Partials.index')
@section('head-complement')
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection;
@section('content')
    <form action="{{ route('bankSlipTypes.update', $bankSlipType->id) }}" method="POST" class="form-horizontal">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $bankSlipType->id }}">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>{{ __('Bank slip type') }}</label>
                                <input type="text" id="description" name="description" value="{{ $bankSlipType->description }}" maxlength="50"
                                    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" autofocus>
                                <div class="invalid-feedback">{{ $errors->first('description') }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="pay_commission" name="pay_commission" value="1" {{ old('pay_commission', $bankSlipType->pay_commission) ? 'checked' : '' }}>
                                    <label for="pay_commission">{{ __('Pays commission to the professional for this bank slip type') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="issue_invoice" name="issue_invoice" value="1" {{ old('issue_invoice', $bankSlipType->issue_invoice) ? 'checked' : '' }}>
                                    <label for="issue_invoice">{{ __('Issui invoice for this bank slip type') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="used_financial_agreement" name="used_financial_agreement" value="1" {{ old('used_financial_agreement', $bankSlipType->used_financial_agreement) ? 'checked' : '' }}>
                                    <label for="used_financial_agreement">{{ __('Can be used in financial agreement') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="pay_receipt" name="pay_receipt" value="1" {{ old('pay_receipt', $bankSlipType->pay_receipt) ? 'checked' : '' }}>
                                    <label for="pay_receipt">{{ __('Receive receipt fee if patient does not brings') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('bankSlipTypes.index') }}" class="btn btb-sm btn-danger"><i class="fas fa-arrow-circle-left"></i> {{ __('Go back') }}</a>
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>
                    {{ __('Save') }}</button>
            </div>
        </div>
    </form>
@endsection;
