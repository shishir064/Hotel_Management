@extends('layouts.dashboard')

@section('content')
    <style>
        @media print {
            body * {
                visibility: hidden !important;
            }

            #printable,
            #printable * {
                visibility: visible !important;
            }

            #printable {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                border: none !important;
                box-shadow: none !important;
            }

            header,
            nav,
            aside,
            .sidebar,
            .topbar {
                display: none !important;
            }

            .no-print,
            .no-print * {
                display: none !important;
            }
        }

        /* Dotted underline fields (not a Tailwind utility) */
        .field-input {
            border: none;
            border-bottom: 1px dotted #999;
            outline: none;
            background: transparent;
            font-size: 12.5px;
            padding: 1px 3px;
            color: #111;
            flex: 1;
            min-width: 0;
        }

        /* Table cell inputs — reset browser defaults cleanly */
        .cell-input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            font-size: 12.5px;
            font-family: inherit;
            color: #111;
            padding: 3px 2px;
        }

        .cell-input[readonly] {
            background: #fafafa;
            color: #555;
        }

        /* Summary table inputs */
        .sum-input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            text-align: right;
            font-size: 12.5px;
            font-family: inherit;
            color: #111;
        }

        .sum-input[readonly] {
            background: #fafafa;
            color: #555;
        }

        /* Fixed table layout for the billing table */
        .bill-table {
            table-layout: fixed;
            border-collapse: collapse;
            width: 100%;
        }

        .col-desc {
            width: 46%;
        }

        .col-qty {
            width: 10%;
        }

        .col-rate {
            width: 18%;
        }

        .col-amount {
            width: 18%;
        }

        .col-action {
            width: 8%;
        }
    </style>

    <div class="max-w-4xl mx-auto p-6">

        {{-- ══════════════ RECEIPT ══════════════ --}}
        <div id="printable"
            class="bg-white border-2 border-green-700 border-t-[6px] font-sans text-sm text-gray-900 max-w-3xl mx-auto">

                        {{-- Header --}}
                        <div class="flex items-start justify-between px-5 py-3 border-b border-gray-300">
                            <div>
                                <p class="text-2xl font-black leading-tight text-gray-900">{{ $bill->room->hotel->hotel_name }}</p>
                                <p class="text-xs text-gray-500 mt-0.5 leading-relaxed">
                                    {{ $bill->room->hotel->address }}<br>
                                    Tel: {{ $bill->room->hotel->phone }}<br>
                                    E-mail: {{ $bill->room->hotel->email }} <br>
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-3xl font-black tracking-tight text-gray-900">Hotel Bill</p>
                                <p class="text-lg font-bold text-green-600">00001</p>
                            </div>
                        </div>
                <form action="{{ route('bill.store') }}" method="POST" class="no-print}}">
                    @csrf
                    {{-- Guest info --}}
                            <div class="grid grid-cols-2 border-b border-gray-300">
                                <input type="text" name="user_id" hidden value="{{$bill->user_id}}">
                                <input type="text" name="room_id" hidden value="{{$bill->room_id}}">
                                <input type="text" name="bill_id" hidden value="{{$bill->id}}">
                                <div class="px-5 py-3 border-r border-gray-300 space-y-1.5">
                                    <div class="flex items-center gap-2">
                                        <label class="text-xs font-semibold text-gray-600 whitespace-nowrap w-16">Date:</label>
                                        <input type="date" id="invDate" class="field-input" value="{{ now()->format('Y-m-d') }}">
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="text-xs font-semibold text-gray-600 whitespace-nowrap w-16">Room No:</label>
                                        <input type="text" id="roomNo" value="{{ $bill->room->room_no }}" class="field-input">
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="text-xs font-semibold text-gray-600 whitespace-nowrap w-16">Check In:</label>
                                        <input type="date" id="checkIn" class="field-input" value="{{ $bill->check_in }}">
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="text-xs font-semibold text-gray-600 whitespace-nowrap w-16">Check Out:</label>
                                        <input type="date" id="checkOut" class="field-input" value="{{ $bill->check_out }}">
                                    </div>
                                </div>

                                <div class="px-5 py-3 space-y-1.5">
                                    <div class="flex items-center gap-2">
                                        <label class="text-xs font-semibold text-gray-600 whitespace-nowrap w-20">Guest Name:</label>
                                        <input type="text" id="guestName" value="{{ $bill->user->name }}" class="field-input">
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="text-xs font-semibold text-gray-600 whitespace-nowrap w-20">Address:</label>
                                        <input type="text" id="guestAddress" class="field-input" value="{{ $bill->user->address }}">
                                    </div>
                                    <div class="flex items-center gap-2 mt-1">
                                        <label class="text-xs font-semibold text-gray-600 whitespace-nowrap w-20">Tel:</label>
                                        <input type="text" id="guestTel" class="field-input" value="{{ $bill->user->phone }}">
                                    </div>
                                </div>

                            </div>

                            {{-- Services table --}}
                            <table class="bill-table">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th
                                            class="col-desc border border-gray-300 px-3 py-2 text-left text-xs font-bold uppercase tracking-wide">
                                            Services</th>
                                        <th
                                            class="col-qty  border border-gray-300 px-3 py-2 text-center text-xs font-bold uppercase tracking-wide">
                                            Qty</th>
                                        <th
                                            class="col-rate border border-gray-300 px-3 py-2 text-center text-xs font-bold uppercase tracking-wide">
                                            Rate</th>
                                        <th
                                            class="col-amount border border-gray-300 px-3 py-2 text-right text-xs font-bold uppercase tracking-wide">
                                            Charges</th>
                                        <th class="col-action border border-gray-300 no-print"></th>
                                    </tr>
                                </thead>
                                <tbody id="billTable">

                                    {{-- Category: Room --}}
                                    <tr class="bg-gray-50">
                                        <td colspan="5" class="border border-gray-300 px-3 py-1.5 text-xs font-bold text-gray-700">
                                            Room
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-200 px-1.5 py-0.5">
                                            <input class="cell-input" value="Room Charge" readonly>
                                        </td>
                                        <td class="border border-gray-200 px-1.5 py-0.5">
                                            <input class="cell-input qty text-center" value="1">
                                        </td>
                                        <td class="border border-gray-200 px-1.5 py-0.5">
                                            <input class="cell-input rate text-right" value="{{ $bill->room->room_price }}">
                                        </td>
                                        <td class="border border-gray-200 px-1.5 py-0.5">
                                            <input class="cell-input amount text-right" readonly value="{{ $bill->total_price }}">
                                        </td>
                                        <td class="border border-gray-200 no-print"></td>
                                    </tr>

                                </tbody>
                            </table>

                            <div class="no-print">
                                <button
                                type="button"                               
                                onclick="addItem()"
                                    class="m-3 bg-green-700 hover:bg-green-800 text-white text-xs font-semibold px-4 py-1.5 rounded">
                                    + Add Item
                                </button>
                            </div>

                            {{-- Summary --}}
                            <div class="flex justify-end border-t-2 border-gray-300 px-5 py-3">
                                <table class="border-collapse w-full">
                                    <tr>
                                        <td
                                            class="border border-gray-200 px-2 py-1 text-xs font-semibold text-gray-600 whitespace-nowrap">
                                            Subtotal</td>
                                        <td class="border border-gray-200 px-2 py-1 min-w-[110px]"><input id="subtotal"
                                                class="sum-input" readonly placeholder="0.00"></td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-200 px-2 py-1 text-xs font-semibold text-gray-600 whitespace-nowrap">
                                            Discount</td>
                                        <td class="border border-gray-200 px-2 py-1"><input id="discount" class="sum-input"
                                                value="0" oninput="calculateTotal()"></td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-200 px-2 py-1 text-xs font-semibold text-gray-600 whitespace-nowrap">
                                            VAT (%)</td>
                                        <td class="border border-gray-200 px-2 py-1"><input id="tax" class="sum-input"
                                                value="13" oninput="calculateTotal()"></td>
                                    </tr>
                                    <tr class="bg-gray-100">
                                        <td
                                            class="border border-gray-300 px-2 py-1.5 text-sm font-bold text-gray-800 whitespace-nowrap">
                                            TOTAL £</td>
                                        <td class="border border-gray-300 px-2 py-1.5"><input id="grandTotal"
                                                class="sum-input font-bold" readonly placeholder="0.00"></td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-200 px-2 py-1 text-xs font-semibold text-gray-600 whitespace-nowrap">
                                            Advance Paid</td>
                                        <td class="border border-gray-200 px-2 py-1"><input id="advance" class="sum-input"
                                                value="0" oninput="calculateTotal()"></td>
                                    </tr>
                                    <tr class="bg-green-50">
                                        <td
                                            class="border border-green-200 px-2 py-1.5 text-sm font-bold text-green-800 whitespace-nowrap">
                                            Amount Due</td>
                                        <td class="border border-green-200 px-2 py-1.5">
                                            <input id="due"
                                                class="sum-input font-bold text-green-800" readonly placeholder="0.00" name="total"></td>
                                    </tr>
                                </table>
                            </div>

                            {{-- Footer --}}
                            <div class="flex items-center justify-between border-t border-gray-300 px-5 py-2.5">
                                <span class="text-xs text-gray-500">I agree that I have received the services as detailed above.</span>
                                <span class="text-sm font-bold text-gray-900">Thank you for your custom!</span>
                            </div>

                    </div>
                    {{-- end #printable --}}

                    {{-- Payment & notes --}}
                    <div class="no-print max-w-3xl mx-auto mt-4 grid grid-cols-3 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Payment Method</label>
                            <select class="w-full border border-gray-300 rounded-md px-2 py-1.5 text-sm text-gray-800 bg-white" name="payment_method">
                                <option>Cash</option>
                                <option>Card</option>
                                <option>eSewa</option>
                                <option>Khalti</option>
                                <option>Bank Transfer</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Status</label>
                            <select class="w-full border border-gray-300 rounded-md px-2 py-1.5 text-sm text-gray-800 bg-white" name="status">
                                <option>Paid</option>
                                <option>Partial</option>
                                <option>Unpaid</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Notes</label>
                            <textarea rows="2" class="w-full border border-gray-300 rounded-md px-2 py-1.5 text-sm text-gray-800 resize-y"></textarea>
                        </div>
                    </div>

                    {{-- Action buttons --}}
                    <div class="no-print max-w-3xl mx-auto mt-3 mb-8 flex justify-end gap-2">
                        <button onclick="window.print()"
                            class="bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold px-5 py-2 rounded-md">
                            Print
                        </button>
                        <button class="bg-green-700 hover:bg-green-800 text-white text-sm font-semibold px-5 py-2 rounded-md">
                            Confirm Bill
                        </button>
                    </div>

                </form>
        </div>

    <script>
        const services = @json($services);
    </script>

    <script>
        function updateServiceOptions() {

            let selected = [];

            document.querySelectorAll(".service-select").forEach(select => {

                if (select.value) {
                    selected.push(select.value);
                }

            });

            document.querySelectorAll(".service-select").forEach(select => {

                let current = select.value;

                select.innerHTML = `<option value="">Select Service</option>`;

                services.forEach(service => {

                    if (
                        !selected.includes(service.id.toString()) ||
                        current == service.id
                    ) {

                        select.innerHTML += `
                    <option
                        value="${service.id}"
                        data-price="${service.price}"
                        ${current==service.id ? 'selected':''}>
                        ${service.name}
                    </option>
                `;
                    }

                });

            });

        }

        function addItem() {

            const table = document.getElementById('billTable');

            const row = table.insertRow();

            row.innerHTML = `
        <td class="border border-gray-200 px-1.5 py-0.5">
            <select class="cell-input service-select">
                <option value="">Add Service</option>
            </select>
        </td>

        <td class="border border-gray-200 px-1.5 py-0.5">
            <input value="1" class="cell-input qty text-center">
        </td>

        <td class="border border-gray-200 px-1.5 py-0.5">
            <input readonly class="cell-input rate text-right">
        </td>

        <td class="border border-gray-200 px-1.5 py-0.5">
            <input readonly class="cell-input amount text-right">
        </td>

        <td class="border border-gray-200 text-center no-print">
            <button
                onclick="removeRow(this)"
                class="text-red-600 text-lg">
                ✕
            </button>
        </td>
    `;

            updateServiceOptions();
            attachEvents();
        }

        function attachEvents() {

            document.querySelectorAll(".service-select").forEach(select => {

                select.onchange = function() {

                    const option = this.options[this.selectedIndex];

                    const row = this.closest("tr");

                    row.querySelector(".rate").value =
                        option.dataset.price ?? 0;

                    row.querySelector(".qty").dispatchEvent(new Event('input'));

                    updateServiceOptions();

                };

            });

            document.querySelectorAll(".qty").forEach(input => {

                input.oninput = function() {

                    const row = this.closest("tr");

                    const qty = parseFloat(row.querySelector(".qty").value) || 0;

                    const rate = parseFloat(row.querySelector(".rate").value) || 0;

                    row.querySelector(".amount").value = (qty * rate).toFixed(2);

                    calculateTotal();

                };

            });

        }

        function calculateTotal() {
            let subtotal = 0;
            document.querySelectorAll('.amount').forEach(el => {
                subtotal += parseFloat(el.value) || 0;
            });
            document.getElementById('subtotal').value = subtotal.toFixed(2);

            const discount = parseFloat(document.getElementById('discount').value) || 0;
            const taxPct = parseFloat(document.getElementById('tax').value) || 0;
            const taxable = subtotal - discount;
            const grand = taxable + taxable * taxPct / 100;
            document.getElementById('grandTotal').value = grand.toFixed(2);

            const advance = parseFloat(document.getElementById('advance').value) || 0;
            document.getElementById('due').value = (grand - advance).toFixed(2);
        }

        attachEvents();
        calculateTotal();

        function removeRow(button) {

            button.closest("tr").remove();

            updateServiceOptions();

            calculateTotal();

        }
    </script>
@endsection
