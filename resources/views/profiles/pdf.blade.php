<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saivas Profiles</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: DejaVu Sans, sans-serif;
        }

        body {
            margin: 18px;
            font-size: 11px;
            color: #1e293b;
        }

        .header {
            border-bottom: 1px solid #dbe2ea;
            padding-bottom: 14px;
            margin-bottom: 16px;
        }

        .title {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
        }

        .subtitle {
            margin-top: 5px;
            font-size: 12px;
            color: #64748b;
        }

        .meta-wrap {
            margin-top: 14px;
        }

        .meta-title {
            font-size: 11px;
            font-weight: 700;
            color: #475569;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: .06em;
        }

        .filters-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        .filters-table td {
            border: 1px solid #e2e8f0;
            padding: 8px 10px;
            vertical-align: top;
            font-size: 11px;
        }

        .filters-label {
            width: 140px;
            background: #f8fafc;
            font-weight: 700;
            color: #334155;
        }

        .filters-value {
            color: #475569;
        }

        .profiles-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 14px;
        }

        /* Prevent repeated table heading on next page */
        thead {
            display: table-row-group;
        }

        .profiles-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 10px;
            padding: 10px 8px;
            border: 1px solid #e2e8f0;
            text-align: left;
            vertical-align: middle;
            font-weight: 700;
        }

        .profiles-table td {
            border: 1px solid #e2e8f0;
            padding: 8px 7px;
            vertical-align: top;
            font-size: 10.5px;
            color: #334155;
        }

        .profiles-table tbody tr:nth-child(even) {
            background: #fcfcfd;
        }

        .name {
            font-weight: 700;
            color: #0f172a;
        }

        .count-badge {
            display: inline-block;
            margin-top: 8px;
            padding: 6px 10px;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            color: #c2410c;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
        }
    </style>
</head>
<body>

<div class="header">
    <h1 class="title">Saivas Matrimony Profiles Report</h1>
    <div class="subtitle">
        Filtered profile export generated from the admin panel
    </div>

    <div class="count-badge">
        Total Profiles: {{ $profiles->count() }}
    </div>
</div>

<div class="meta-wrap">
    <div class="meta-title">Applied Filters</div>

    <table class="filters-table">
        <tr>
            <td class="filters-label">Gender</td>
            <td class="filters-value">
                {{ $appliedFilters['gender'] ?? '—' }}
            </td>

            <td class="filters-label">Profile Count</td>
            <td class="filters-value">
                {{ $appliedFilters['profile_count'] ?? $profiles->count() }}
            </td>
        </tr>

        <tr>
            <td class="filters-label">Native Place</td>
            <td class="filters-value">
                {{ !empty($appliedFilters['native_places']) ? implode(', ', $appliedFilters['native_places']) : '—' }}
            </td>

            <td class="filters-label">Qualification</td>
            <td class="filters-value">
                {{ !empty($appliedFilters['educations']) ? implode(', ', $appliedFilters['educations']) : '—' }}
            </td>
        </tr>

        <tr>
            <td class="filters-label">Job Location</td>
            <td class="filters-value">
                {{ !empty($appliedFilters['working_places']) ? implode(', ', $appliedFilters['working_places']) : '—' }}
            </td>

            <td class="filters-label">Star</td>
            <td class="filters-value">
                {{ !empty($appliedFilters['stars']) ? implode(', ', $appliedFilters['stars']) : '—' }}
            </td>
        </tr>

        <tr>
            <td class="filters-label">Salary Range</td>
            <td class="filters-value">
                @php
                    $salaryMin = $appliedFilters['salary_min'] ?? null;
                    $salaryMax = $appliedFilters['salary_max'] ?? null;
                @endphp

                @if ($salaryMin && $salaryMax)
                    ₹{{ number_format($salaryMin) }} - ₹{{ number_format($salaryMax) }}
                @elseif ($salaryMin)
                    From ₹{{ number_format($salaryMin) }}
                @elseif ($salaryMax)
                    Up to ₹{{ number_format($salaryMax) }}
                @else
                    —
                @endif
            </td>

            <td class="filters-label">Age Range</td>
            <td class="filters-value">
                @php
                    $ageMin = $appliedFilters['age_min'] ?? null;
                    $ageMax = $appliedFilters['age_max'] ?? null;
                @endphp

                @if ($ageMin && $ageMax)
                    {{ $ageMin }} - {{ $ageMax }} years
                @elseif ($ageMin)
                    From {{ $ageMin }} years
                @elseif ($ageMax)
                    Up to {{ $ageMax }} years
                @else
                    —
                @endif
            </td>
        </tr>
    </table>
</div>

<table class="profiles-table">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Father Name</th>
        <th>DOB</th>
        <th>Age</th>
        <th>Height</th>
        <th>Salary</th>
        <th>Star</th>
        <th>Qualification</th>
        <th>Occupation</th>
        <th>Native Place</th>
        <th>Job Location</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($profiles as $profile)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="name">{{ $profile->name }}</td>
            <td>{{ $profile->father_name ?? '—' }}</td>
            <td>{{ $profile->dob ? $profile->dob->format('d-m-Y') : '—' }}</td>
            <td>{{ $profile->age ?? '—' }}</td>
            <td>{{ $profile->height ?? '—' }}</td>
            <td>{{ $profile->salary ? number_format($profile->salary, 2) : '—' }}</td>
            <td>{{ $profile->star->name ?? '—' }}</td>
            <td>{{ $profile->educationQualification->name ?? '—' }}</td>
            <td>{{ $profile->occupation->name ?? '—' }}</td>
            <td>{{ $profile->nativePlace->name ?? '—' }}</td>
            <td>{{ $profile->workingPlace->name ?? '—' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
