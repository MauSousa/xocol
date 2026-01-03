@php
    $services = $inquiry->services ?? [];
@endphp

<h1>New inquiry received</h1>

<p><strong>Name:</strong> {{ $inquiry->name }}</p>
<p><strong>Phone / WhatsApp:</strong> {{ $inquiry->phone_whatsapp }}</p>
<p><strong>Company:</strong> {{ $inquiry->company ?? '—' }}</p>
<p><strong>Services:</strong> {{ count($services) ? implode(', ', $services) : '—' }}</p>
<p><strong>Message:</strong> {{ $inquiry->message ?: '—' }}</p>
