<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>#{{ $order['id']}}.pdf</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/style.pdf.css">
  </head>
  <body>
    <header>
        <div class="header">
            <div class="left" >
                <img src="{{ url('/')}}/assets/images/premier-logo.png"/>
                <strong class="d-block">Premier Breakdown Solutions</strong>
                <div>PBS ID: {{  $user->profile ? $user->profile->pbs_id : '' }}</div>
                <div>Tax ID: {{$user->profile ? $user->profile->tax_id : '' }} </div>
                <div>Phone: {{ $user->profile ? $user->profile->phone : '' }}</div>
                <div>{{ $user->profile ? $user->profile->address : '' }}</div>
            </div>
            <div class="right">
                <table>
                    <tr><td>WORK ORDER REFERENCE {{ $order['work_order_reference']}}</td></tr>
                    <tr><td class="text-center">RS WO#{{ $order['id']}}</td></tr>
                    @if($order['invoice_id'])
                    <tr><td class="text-center">RS Trans#{{ $order['invoice_id'] }}</td></tr>
                    @endif
                    <tr><td class="text-center">{{ date('M d, Y H:m a', strtotime($order->created_at))}}</td></tr>
                </table>
            </div>
        </div>
    </header>
    <footer>
        This site uses PBS. For more information on PBS text RSINFO to (404) 994-4399.
    </footer>
    <main>
        <table class="clear-both table-content">
            <tr><td class="text-center" colspan="2"><label>PAYER INFO</label></td></tr>
            <tr>
              <td><label>Carrier Name</label><span>{{ $order['carrier_name'] }}</span></td>
              <td><label>Contact Name</label><span>{{ $order['signed_contact_name'] }}</span></td>
            </tr>
            <tr>
              <td><label>Contact Phone # or Email</label><span>{{ isset($order['signed_contact_phone'])?$order['signed_contact_phone']:$order['signed_contact_email'] }}</span></td>
              <td><label>Driver Name</label><span>{{ $order['driver_name'] }}</span></td>
            </tr>
            <tr>
              <td><label>Driver Phone # or Email</label><span>{{ isset($order['driver_phone'])?$order['driver_phone']: $order['driver_email']  }}</span></td>
              <td></td>
            </tr>
      
            <tr><td class="text-center" colspan="2"><label>ADDITIONAL INFO</label></td></tr>
      
            <tr>
              <td colspan="2" class="additional-info">
                <div class="d-flex justify-content-between">
                  <span>Dispatch Phone Number</span>
                  <span class="text-right">{{ $order['dispatch_phone_number'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Email</span>
                  <span class="text-right">{{ $order['email'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Last 8 Of VIN</span>
                  <span class="text-right">{{ $order['last_8_of_vin'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Year</span>
                  <span class="text-right">{{ $order['year'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Make</span>
                  <span class="text-right">{{ $order['make'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Model</span>
                  <span class="text-right">{{ $order['model'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Unit Number</span>
                  <span class="text-right">{{ $order['unit_number'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Issue With Unit</span>
                  <span class="text-right">{{ $order['issue_with_unit'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Location</span>
                  <span class="text-right">{!!  $order['location'] ? $order['location']['name']  : '' !!}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Addition Notes</span>
                  <span class="text-right">{{ $order['additional_notes'] }}</span>
                </div>
              </td>
            </tr>
            <tr><td class="text-center" colspan="2"><label>WORK AUTHORIZATION</label></td></tr>
            <tr>
              <td colspan="2" class="work-auth">
                <strong class="d-block">PLEASE SIGN THIS WORK AUTHORIZATION AND RETURN AS SOON AS POSSIBLE.</strong>
                <strong class="d-block">A TECHNICIAN WILL BE DISPATCHED IMMEDIATELY UPON RECEIPT.</strong>
                <strong class="d-block">WORK ORDER AUTHORIZATION:</strong>
                {!! $order['template']['template_description'] !!}
              </td>
            </tr>
        </table>
        <p style="page-break-after: always;"></p>
        <p style="page-break-after: never;"> </p>
        <table class="clear-both table-content page-2">
            <tr>
              <td colspan="2">
                <strong class="d-block">SERVICE RATES</strong>
                  <div class="">
                    {!! $order['template']['service_rates'] !!}
                  </div>
                  <strong class="d-block">ADDITIONAL FEES</strong>
                  <div>
                    {!! $order['template']['additional_fees'] !!}
                  </div>
                  <strong class="d-block">CREDIT CARD AUTHORIZATION</strong>
                  {!! $order['template']['credit_card_authorization'] !!}
              </td>
            </tr>
            <tr>
              <td colspan="2" class="text-center font-weight-bold">SIGNATURE</td>
            </tr>
            <tr>
              <td colspan="2">
                <p class="empty-sign">
                    @if($order['signature'])
                    <img src="{{ $order['signature'] }}"/>
                    @endif
                </p>
                </td>
            </tr>
          </table>
      
    </main>
    
  </body>
</html>