<!doctype html>
<html>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<head>
    <meta charset="utf-8">
    <title>Recipt</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="/img/reciept_logo_black.png" style="width:100%; max-width:300px;">
                            </td>

                            <td>
                                Reciept #: {{$reciept->number}}<br>
                                Created: {{$reciept->created_at}}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                CBA Infotech<br>
                                Kalanaur Road,<br>
                                143521,<br>
                                Gurdaspur, Punjab<br>
                                Tel no: 01874-503705
                            </td>

                            <td>
                                {{$reciept->student->name}}<br>
                                +91 {{$reciept->student->tel_no}}<br>
                                Course(s): {{$student->course->name}}
                                ,
                                @if($student->course2){{$student->course2->name}}
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Payment Method
                </td>

                <td>
                    Cash
                </td>
            </tr>

            <tr class="details">
                <td>
                    Cash
                </td>

                <td>
                    ₹ {{$reciept->paid_fee}}
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Particulars
                </td>

                <td>
                    Info
                </td>
            </tr>

            <tr class="details">
                <td>
                    Remaining Balance
                </td>

                <td>
                    ₹ {{$reciept->balance}}
                </td>
            </tr>
            <tr class="details">
                <td>
                    Next Due Date
                </td>

                <td>
                    {{$reciept->due_date}}
                </td>
            </tr>

            <tr>
                <td>Student Signature:</td>

                <td>Stamp/Signature:</td>
            </tr>

            <tr>
                <td>
                    <span style="font-size:13px">The fee is not refundable</span>
                </td>
            </tr>
        </table>

    </div>

    <div class="col-lg-12 text-center" style="margin-top:20px">
        <button onclick="myFunction()" class="btn btn-success">Print Reciept</button>
    </div>
    <script>
        function myFunction() {
            window.print();
        }
    </script>
</body>

</html>