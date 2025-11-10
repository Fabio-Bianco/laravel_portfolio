<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Project store/update validation request
 * 
 * simplified: extracted validation logic from controller
 * reusable for both create and update operations
 */
class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Only admins can create/update projects (handled by middleware)
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image_url' => ['nullable', 'url', 'max:255'],
            'link' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'demo_url' => ['nullable', 'url', 'max:255'],
            'type_id' => ['nullable', 'integer', 'exists:types,id'],
            'technologies' => ['nullable', 'array'],
            'technologies.*' => ['integer', 'exists:technologies,id'],
            'is_published' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'featured_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il titolo è obbligatorio.',
            'image_url.url' => "Inserisci un URL valido per l'immagine.",
            'link.url' => 'Inserisci un URL valido per il link esterno.',
            'github_url.url' => 'Inserisci un URL valido per il repository GitHub.',
            'demo_url.url' => 'Inserisci un URL valido per la demo pubblica.',
            'type_id.exists' => 'Il tipo selezionato non è valido.',
            'technologies.*.exists' => 'Una delle tecnologie selezionate non è valida.',
            'display_order.min' => "L'ordine non può essere negativo.",
            'featured_order.min' => "L'ordine featured non può essere negativo.",
        ];
    }
}
