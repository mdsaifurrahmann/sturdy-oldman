@extends('layouts.fullLayoutClient')

@section('title', 'Infrastructure')
{{-- @section('og-img', 'Layout Blank') --}}

@section('page-style')
    <link rel="stylesheet" href="{{asset(mix('css/client/infrastructure.css'))}}">

@stop

@section('main-content')

    <!-- page title -->

    <div class="card">
        {{--        <h2 class="card__title">Infrastructure:</h2>--}}

        <div class="infrastructure__title">

            <h3>ভূমি ও ভৌত অবকাঠামো সংবলিত তথ্য</h3>
            <p>জমি : মোট জমির পরিমান : ৬.০০ একর।
                <br>
                জমি, ভবন ও অন্যান্য :
            </p>

        </div>

        <div class="overflow-auto">

            <table>
                <tbody>
                <tr>
                    <th>
                        <p>বিবরণ</p>
                    </th>
                    <th colspan="5">
                        <p>পরিমান</p>
                    </th>
                    <th>
                        <div>মন্তব্য</div>
                    </th>
                </tr>
                <tr>
                    <th rowspan="2">
                        <p>১। জমি</p>
                    </th>
                    <td>
                        <div>জমির পরিমান(একরে)</div>
                    </td>
                    <td>
                        <p>বাৎসরকি ভূমি কররে পরমিান (টাকায়)</p>
                    </td>
                    <td colspan="3">
                        <p>যে সন পর্যন্ত ভুমি কর পরিশোধ করা আছে</p>
                    </td>
                    <td rowspan="2">
                        <p>২০১১-২০১২ইং</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>&nbsp;&nbsp;৫.৯৫৮১ একর</p>
                    </td>
                    <td>
                        <p>৪১৭০.৬৭</p>
                    </td>
                    <td colspan="3"><span>অবশষে যে সন র্পযন্ত পরশিোধ</span></td>
                </tr>
                <tr>
                    <th rowspan="3">
                        <p>২। ভবন</p>
                    </th>
                    <td rowspan="2">
                        <p>একাডেমিক ও প্রশাসনিক(বর্গফুট)</p>
                    </td>
                    <td rowspan="2">
                        <p>ব্যবহারিক শেড (বর্গফুট)</p>
                    </td>
                    <td colspan="3">
                        <p>আবাসিক(বর্গফুট)</p>
                    </td>
                    <td rowspan="3">
                        <p>(১ কপি)</p>
                        <p>
                        </p></td>
                </tr>
                <tr>
                    <td>
                        <p>কোয়াটার/ডরমেটরী</p>
                    </td>
                    <td colspan="2">
                        <p>ছাত্রী&nbsp;হোস্টেল</p>
                        <p>
                        </p></td>
                </tr>
                <tr>
                    <td>
                        <p>১৬৫১৫.৭৪</p>
                    </td>
                    <td>
                        <p>৮৬৪৫.১৬</p>
                    </td>
                    <td><span>&nbsp;৮৮৫/৩৬০০&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                    <td colspan="2">
                        <p>৮৮৫</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p>৩। পুকুর</p>
                    </th>
                    <td>
                        <p>১ টি</p>
                    </td>
                    <td colspan="4">
                        <p>৩৩ শতাংশ আয়তন</p>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th rowspan="2">
                        <p>৪। বিদ্যমান গাছ</p>
                    </th>
                    <td>
                        <p>ফলজ</p>
                    </td>
                    <td>
                        <p>বনজ</p>
                    </td>
                    <td colspan="2">
                        <div>ঔষধি</div>
                    </td>
                    <td><span>মোট</span></td>
                    <td rowspan="2">
                        <p>অন্যান্য গাছ ১৬৯</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>৭০</p>
                    </td>
                    <td>
                        <p>২২৯</p>
                    </td>
                    <td colspan="2">
                        <p>৬৬১ টি নিম গাছ মারা গেছে</p>
                    </td>
                    <td>
                        <p>৩৬৫</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="infrastructure__title">
            <h3>(খ) বিদ্যমান অবকাঠামোঃ</h3>
        </div>


        <div class="overflow-auto">
            <table class="table-b">
                <tbody>
                <tr>
                    <th><span>১। একাডেমিক&nbsp; ভবন-১</span></th>
                    <td>
                        <p>১ম তলা- ৪৪৭.৮৮ বর্গমিটার<br>
                            ২য় তলা- ৪৪৭.৮৮ বর্গমিটার<br>
                            ৩য় তলা-(চিলাকোঠা) ২০.৯৫ বর্গমিটার<br>
                            ৯১৬.৭১ বর্গমিটার</p>
                    </td>
                    <th><span>৮।সীমানা প্রাচীর</span></th>
                    <td><span>২৫০ মি.</span></td>
                </tr>
                <tr>
                    <th><span>২। একাডেমিক ভবন-২(সাবেক ছাত্রাবাস)</span></th>
                    <td>
                        <p>১ম তলা- ২৯৮.৩০বর্গমিটার<br>
                            ২য় তলা- ২৯৮.৩০বর্গমিটার<br>
                            ৩য় তলা-(চলিাকোঠা)১৫.১২ বর্গমিটার<br>
                            ৬১৮.২৮বর্গমিটার</p>
                    </td>
                    <th><span>৯। বিটুমিনাস কারপেটিং এপ্রোচ রোড</span></th>
                    <td><span>৭৪৩.২৪বর্গমিটার</span></td>
                </tr>
                <tr>
                    <th><span>৩। হডে মাষ্টার কোর্য়াটার</span></th>
                    <td><span>১ম তলা- ৮১.২০বর্গমিটার<br>
২য় তলা- ৮১.২০বর্গমিটার<br>
৩য় তলা-(চলিাকোঠা) বর্গমিটার<br>
১৭৭.৫২বর্গমিটার</span></td>
                    <th><span>১০। ড্রেন</span></th>
                    <td><span>৫৩৭.১৫ আর, এম</span></td>
                </tr>
                <tr>
                    <th><span>৪। ডরমটেরী</span></th>
                    <td><span>১ম তলা- ১৫৯.০৫বর্গমিটার<br>
২য় তলা- ১৫৯.০৫বর্গমিটার<br>
৩য় তলা-(চলিাকোঠা) বর্গমিটার<br>
৪১৩.১০বর্গমিটার</span></td>
                    <th><span>১১। কটন স্পিনিং শেড</span></th>
                    <td><span>১ম তলা- ৭১৯.০০বর্গমিটার<br>
২য় তলা- ৭১৯.০০বর্গমিটার<br>
৩য় তলা-(চলিাকোঠা) বর্গমিটার<br>
১৪৯৩.১৯বর্গমিটার</span></td>
                </tr>
                <tr>
                    <th><span>৫। উইভিং ওর্য়াকশপ(সি,আই সীট)</span></th>
                    <td><span>৪৫০বর্গমিটার</span></td>
                    <th><span>১২। জুট শেড (জিঙ্ক এ্যালোমনিয়িাম রোফিং সীট)</span></th>
                    <td><span>৭১৯বর্গমিটার</span></td>
                </tr>
                <tr>
                    <th><span>৬। গ্যারজে(সি,আই সীট)</span></th>
                    <td><span>৭৯বর্গমিটার</span></td>
                    <th><span>১৩। সীমানা প্রাচীর</span></th>
                    <td><span>৩১৬.৬৭ আর,এম</span></td>
                </tr>
                <tr>
                    <th><span>৭। ওভার হেড পানরি ট্যাংক</span></th>
                    <td><span>১০০০ গ্যালন ধারন ক্ষমতা সম্পন্ন</span></td>
                    <th><span>১৪। এপ্রোচ রোড</span></th>
                    <td><span>৩০০.০০বর্গমিটার</span></td>
                </tr>
                </tbody>
            </table>
        </div>


    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
