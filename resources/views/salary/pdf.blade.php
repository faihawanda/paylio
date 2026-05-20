<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pay Slip PDF</title>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            background: #ffffff;
            color: #2f2f2f;
            font-size: 12px;
        }

        


        .page {
            padding: 48px 52px 40px;
        }

        /* ================= HEADER ================= */

        .top-header {
            margin-bottom: 42px;
        }

        .top-header table {
            width: 100%;
            border-collapse: collapse;
        }

        .top-header td {
            vertical-align: top;
        }

        .title {
            font-size: 14px;
            font-weight: 700;
            color: #2f2f2f;
        }

        .period-label {
            font-size: 11px;
            color: #8f8f8f;
            text-align: right;
            line-height: 1.2;
        }

        .period-date {
            font-size: 15px;
            font-weight: 700;
            color: #2f2f2f;
            text-align: right;
        }

        /* ================= COMPANY ================= */

        .company {
            text-align: center;
            margin-bottom: 42px;
        }

        .logo {
            font-size: 34px;
            font-weight: 800;
            margin-bottom: 18px;
            color: #000;
        }

        .company-name {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 4px;
            color: #2f2f2f;
        }

        .company-address {
            font-size: 11px;
            color: #8c8c8c;
        }

        /* ================= EMPLOYEE ================= */

        .employee-box {
            background: #f5f5f5;
            border: 1px solid #ececec;
            border-radius: 8px;
            padding: 22px 26px;
            margin-bottom: 52px;
        }

        .employee-box table {
            width: 100%;
            border-collapse: collapse;
        }

        .employee-box td {
            padding: 7px 0;
            font-size: 12px;
            vertical-align: top;
        }

        .label {
            width: 130px;
            color: #3a3a3a;
        }

        .separator {
            width: 15px;
            text-align: center;
            color: #3a3a3a;
        }

        .value {
            font-weight: 700;
            color: #2b2b2b;
        }

        .space {
            width: 55px;
        }

        /* ================= SECTION ================= */

        .section {
            margin-bottom: 38px;
        }

        .section-title {
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.5px;
            color: #3f3f3f;
            margin-bottom: 14px;
            text-transform: uppercase;
        }

        .salary-table {
            width: 100%;
            border-collapse: collapse;
        }

        .salary-table td {
            padding: 12px 8px;
            border-bottom: 1px solid #dfdfdf;
            font-size: 12px;
        }

        .salary-table td:last-child {
            text-align: right;
            font-weight: 500;
        }

        .green {
            color: #67c96b;
            font-weight: 700 !important;
        }

        .red {
            color: #ff6d6d;
            font-weight: 700 !important;
        }

        /* ================= TOTAL ================= */

        .total-box {
            border-top: 2px solid #222;
            padding-top: 18px;
            margin-top: 18px;
            margin-bottom: 50px;
        }

        .total-box table {
            width: 100%;
        }

        .total-label {
            font-size: 16px;
            font-weight: 800;
            color: #3a3a3a;
        }

        .total-value {
            text-align: right;
            font-size: 16px;
            font-weight: 800;
            color: #3b82f6;
        }

        /* ================= SIGNATURE ================= */

        .signature {
            margin-top: 10px;
            margin-bottom: 60px;
        }

        .signature table {
            width: 100%;
        }

        .signature td {
            vertical-align: top;
        }

        .signature-right {
            text-align: right;
        }

        .signature-text {
            font-size: 12px;
            color: #7a7a7a;
            line-height: 1.5;
        }

        .signature-line {
            width: 165px;
            border-top: 1px solid #d8d8d8;
            margin-top: 38px;
            margin-left: auto;
            margin-bottom: 26px;
        }

        .signature-name {
            font-size: 13px;
            font-weight: 700;
            color: #2f2f2f;
            text-align: center;
        }

        /* ================= FOOTER ================= */

        .footer {
            margin-top: 40px;
        }

        .footer table {
            width: 100%;
        }

        .footer td {
            font-size: 10px;
            color: #a1a1a1;
            vertical-align: bottom;
        }

        .footer-right {
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="page">

        {{-- ================= HEADER ================= --}}

        <div class="top-header">
            <table>
                <tr>

                    <td>
                        <div class="title">Pay Slip</div>
                    </td>

                    <td style="text-align:right;">

                        <div class="period-label">Periode:</div>

                        <div class="period-date">
                            @php
                                $namaBulan = [
                                    1 => 'January',
                                    2 => 'February',
                                    3 => 'March',
                                    4 => 'April',
                                    5 => 'May',
                                    6 => 'June',
                                    7 => 'July',
                                    8 => 'August',
                                    9 => 'September',
                                    10 => 'October',
                                    11 => 'November',
                                    12 => 'December',
                                ];
                            @endphp

                            {{ $namaBulan[$salary->bulan] }} {{ $salary->tahun }}
                        </div>

                    </td>

                </tr>
            </table>
        </div>

        {{-- ================= COMPANY ================= --}}

        <div class="company">

            <div class="logo">
                Paylio
            </div>

            <div class="company-name">
                Lio Tech Australia Pty Ltd
            </div>

            <div class="company-address">
                88 Flinders St, Melbourne VIC 3000
            </div>

        </div>

        {{-- ================= EMPLOYEE ================= --}}

        <div class="employee-box">

            <table>

                <tr>

                    <td class="label">Employee Name</td>
                    <td class="separator">:</td>
                    <td class="value">
                        {{ $salary->employee->name }}
                    </td>

                    <td class="space"></td>

                    <td class="label">Employee ID</td>
                    <td class="separator">:</td>
                    <td class="value">
                        {{ $salary->employee_id ?? '-' }}
                    </td>

                </tr>

                <tr>

                    <td class="label">Position</td>
                    <td class="separator">:</td>
                    <td class="value">
                        {{ $salary->employee->position ?? '-' }}
                    </td>

                    <td class="space"></td>

                    <td class="label">Department</td>
                    <td class="separator">:</td>
                    <td class="value">
                        {{ $salary->employee->department ?? '-' }}
                    </td>

                </tr>

            </table>

        </div>

        {{-- ================= EARNINGS ================= --}}

        <div class="section">

            <div class="section-title">Earnings</div>

            <table class="salary-table">

                <tr>
                    <td>Base Salary</td>

                    <td>
                        Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <td>Meal Allowance</td>

                    <td class="green">
                        + Rp {{ number_format($salary->tunjangan_makan, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <td>Transportation Allowance</td>

                    <td class="green">
                        + Rp {{ number_format($salary->tunjangan_transportasi, 0, ',', '.') }}
                    </td>
                </tr>

            </table>

        </div>

        {{-- ================= DEDUCTIONS ================= --}}

        <div class="section">

            <div class="section-title">DEDUCTIONS</div>

            <table class="salary-table">

                <tr>

                    <td>Deductions</td>

                    <td class="red">
                        - Rp {{ number_format($salary->potongan, 0, ',', '.') }}
                    </td>

                </tr>

            </table>

        </div>

        {{-- ================= TOTAL ================= --}}

        <div class="total-box">

            <table>

                <tr>

                    <td class="total-label">
                        Net Salary Received
                    </td>

                    <td class="total-value">
                        Rp {{ number_format($salary->gaji_bersih, 0, ',', '.') }}
                    </td>

                </tr>

            </table>

        </div>

        {{-- ================= SIGNATURE ================= --}}

        <div class="signature">

            <table>

                <tr>

                    <td></td>

                    <td class="signature-right">

                        <div class="signature-text">
                            Sincerly,<br>

                            {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                        </div>

                        <div class="signature-line"></div>

                    </td>

                </tr>

                <tr>

                    <td></td>

                    <td>
                        <div class="signature-name">
                            HRD / Manager
                        </div>
                    </td>

                </tr>

            </table>

        </div>

        {{-- ================= FOOTER ================= --}}

        <div class="footer">

            <table>

                <tr>

                    <td>
                        this document is automatically generated by the payroll system.<br>
                        No signature is required.
                    </td>

                    <td class="footer-right">
                        Printed: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
                    </td>

                </tr>

            </table>

        </div>

    </div>

</body>

</html>
