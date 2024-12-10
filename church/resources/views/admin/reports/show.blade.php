@extends('layouts.app')

@section('title', 'Audit Details')

@section('content')
<div class="audit-details-container">
    <div class="header-section">
        <div class="logo">
            <img src="/images/sda.png" alt="Logo">
        </div>
        <div class="page-title">Report Details</div>
    </div>

    <div class="details-row">
        <div class="details-item">
            <dt>Model Type</dt>
            <dd>{{ $audit->auditable_type }}</dd>
        </div>
        <div class="details-item">
            <dt>Model ID</dt>
            <dd>{{ $audit->auditable_id }}</dd>
        </div>
        <div class="details-item">
            <dt>Event</dt>
            <dd>{{ ucfirst($audit->event) }}</dd>
        </div>
        <div class="details-item">
            <dt>User</dt>
            <dd>{{ $audit->user ? $audit->user->name : 'System' }}</dd>
        </div>
        <div class="details-item">
            <dt>Old Values</dt>
            <dd>
                <table class="audit-table">
                    <tbody>
                        @php
                            $oldValues = is_array($audit->old_values) ? $audit->old_values : json_decode($audit->old_values, true);
                        @endphp
                        @foreach ($oldValues as $key => $value)
                            <tr>
                                <td><strong>{{ ucwords(str_replace('_', ' ', $key)) }}</strong></td>
                                <td>{{ is_null($value) ? 'N/A' : $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </dd>
        </div>
        <div class="details-item">
            <dt>New Values</dt>
            <dd>
                <table class="audit-table">
                    <tbody>
                        @php
                            $newValues = is_array($audit->new_values) ? $audit->new_values : json_decode($audit->new_values, true);
                        @endphp
                        @foreach ($newValues as $key => $value)
                            <tr>
                                <td><strong>{{ ucwords(str_replace('_', ' ', $key)) }}</strong></td>
                                <td>{{ is_null($value) ? 'N/A' : $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </dd>
        </div>
        <div class="details-item">
            <dt>Date</dt>
            <dd>{{ $audit->created_at->format('Y-m-d H:i:s') }}</dd>
        </div>
    </div>

    <div class="button-container">
        <a href="{{ route('admin.report') }}" class="details-btn btn-secondary">Back to Reports</a>
        <button onclick="window.print()" class="details-btn btn-primary">Print</button>
    </div>
</div>

<style>
    /* General styling */
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, rgba(173, 216, 230, 0.3), rgba(255, 99, 71, 0.3), rgba(255, 255, 255, 0.5));
        background-repeat: no-repeat;
        background-attachment: fixed;
        margin: 0;
        padding: 0;
    }

    .audit-details-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 20px;
        border-bottom: 1px solid #ddd;
    }

    .header-section .logo img {
        max-width: 60px;
    }

    .page-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .details-row {
        margin-top: 20px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .details-item {
        background: #fafafa;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.05);
    }

    .details-item dt {
        font-weight: bold;
        color: #555;
    }

    .details-item dd {
        margin: 0;
        color: #777;
    }

    .audit-table {
        width: 100%;
        border-collapse: collapse;
    }

    .audit-table td {
        padding: 6px 10px;
        border-bottom: 1px solid #ddd;
    }

    .audit-table td:first-child {
        width: 40%;
        font-weight: bold;
        color: #555;
    }

    .button-container {
        text-align: center;
        margin-top: 30px;
    }

    .details-btn {
        display: inline-block;
        margin: 5px;
        padding: 12px 20px;
        color: #fff;
        background-color: #007bff;
        text-decoration: none;
        border-radius: 6px;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .details-btn:hover {
        background-color: #0056b3;
    }

    .details-btn.btn-primary {
        background-color: #28a745;
    }

    .details-btn.btn-primary:hover {
        background-color: #218838;
    }

    footer {
        margin-top: 40px;
        text-align: center;
        color: #aaa;
        font-size: 0.9em;
    }
</style>

@endsection
