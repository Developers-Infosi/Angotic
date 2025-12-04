<?php

namespace App\Http\Requests\Companyregistration;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //apply
            'applyname' => 'required|string|max:255',
            'applynbi' => 'required|string|max:255',
            'applyposition' => 'required|string|max:255',
            'applyaddress' => 'required|string|max:255',
            'applyemail' => 'required|email',
            'applyphone' => 'required|max:20',

            //company
            'name' => 'required|string|max:255',
            'nif' => 'required|string|max:255',
            'activity' => 'required',
            'phone' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',

            //docs
            'commercialcertificate' => 'required|mimes:pdf,jpg,png,jpeg,PDF',
            'nondebtorcertificate' => 'required|mimes:pdf,jpg,png,jpeg,PDF',
            'republicdiary' => 'required|mimes:pdf,jpg,png,jpeg,PDF',
            'bi' => 'required|mimes:pdf,jpg,png,jpeg,PDF',
        ];
    }
    public function messages()
    {
        return [

            'applyname.required' => 'O nome do requerente é obrigatório.',
            'applyname.string' => 'O nome do requerente deve ser uma string.',
            'applyname.max' => 'O nome do requerente não pode ser superior a :max caracteres.',

            'applynbi.required' => 'O número do bilhete de identidade do requerente é obrigatório.',
            'applynbi.string' => 'O número do bilhete de identidade do requerente deve ser uma string.',
            'applynbi.max' => 'O número do bilhete de identidade do requerente não pode ser superior a :max caracteres.',

            'applyposition.required' => 'A função do requerente é obrigatório.',
            'applyposition.string' => 'A função do requerente deve ser uma string.',
            'applyposition.max' => 'A função do requerente não pode ser superior a :max caracteres.',

            'applyaddress.required' => 'O endereço do requerente é obrigatório.',
            'applyaddress.string' => 'O endereço do requerente deve ser uma string.',
            'applyaddress.max' => 'O endereço do requerente não pode ser superior a :max caracteres.',

            'applyemail.required' => 'O email do requerente é obrigatório.',
            'applyemail.email' => 'O email do requerente deve ser um endereço de e-mail válido.',

            'applyphone.required' => 'O telefone do requerente é obrigatório.',
            'applyphone.max' => 'O telefone do requerente não pode ser superior a :max caracteres.',

            //company
            'name.required' => 'O nome da empresa é obrigatório.',
            'name.string' => 'O nome da empresa deve ser uma string.',
            'name.max' => 'O nome da empresa não pode ser superior a :max caracteres.',

            'nif.required' => 'O NIF da empresa é obrigatório.',
            'nif.string' => 'O NIF da empresa deve ser uma string.',
            'nif.max' => 'O NIF da empresa não pode ser superior a :max caracteres.',

            'activity.required' => 'A actividade da empresa é obrigatório.',

            'phone.required' => 'O telefone da empresa é obrigatório.',
            'phone.max' => 'O telefone da empresa não pode ser superior a :max caracteres.',

            'email.required' => 'O email do empresa é obrigatório.',
            'email.email' => 'O email do empresa deve ser um endereço de e-mail válido.',

            'address.required' => 'O endereço da empresa é obrigatório.',
            'address.string' => 'O endereço da empresa deve ser uma string.',
            'address.max' => 'O endereço da empresa não pode ser superior a :max caracteres.',

            //docs
            'commercialcertificate.required' => 'O ficheiro certidão comercial é obrigatório.',
            'commercialcertificate.mimes' => 'O ficheiro certidão comercial deve ser um arquivo do tipo: :values.',
            'commercialcertificate.max' => 'O ficheiro certidão comercial não pode ser superior a :max kilobytes.',
            'commercialcertificate.file' => 'O ficheiro certidão comercial deve ser um arquivo.',

            'nondebtorcertificate.required' => 'O ficheiro certidão não devedor(AGT) é obrigatório.',
            'nondebtorcertificate.mimes' => 'O ficheiro certidão não devedor(AGT) deve ser um arquivo do tipo: :values.',
            'nondebtorcertificate.max' => 'O ficheiro certidão não devedor(AGT) não pode ser superior a :max kilobytes.',
            'nondebtorcertificate.file' => 'O ficheiro certidão não devedor(AGT) deve ser um arquivo.',

            'republicdiary.required' => 'O ficheiro diário da república é obrigatório.',
            'republicdiary.mimes' => 'O ficheiro diário da república deve ser um arquivo do tipo: :values.',
            'republicdiary.max' => 'O ficheiro diário da república não pode ser superior a :max kilobytes.',
            'republicdiary.file' => 'O ficheiro diário da república deve ser um arquivo.',

            'bi.required' => 'O ficheiro bilhete de identidade é obrigatório.',
            'bi.mimes' => 'O ficheiro bilhete de identidade deve ser um arquivo do tipo: :values.',
            'bi.max' => 'O ficheiro bilhete de identidade não pode ser superior a :max kilobytes.',
            'bi.file' => 'O ficheiro bilhete de identidade deve ser um arquivo.'

        ];
    }
}
