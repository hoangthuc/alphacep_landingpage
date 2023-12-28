<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>#{{ $invoice['id']}}.pdf</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/style.pdf.css">
  </head>
  <body>
    <header>
        <div class="header">
            <div class="left" >
                <img src="{{ url('/')}}/assets/images/premier-logo.png"/>
                <strong class="d-block">Premier Breakdown Solutions</strong>
                <div>PBS ID: {{ $user['profile']?$user['profile']['pbs_id']:null }}</div>
                <div>Tax ID: {{ $user['profile']?$user['profile']['tax_id']:null}} </div>
                <div>Phone: {{ $user['profile']?$user['profile']['phone']:null}}</div>
                <div>{{ $user['profile']?$user['profile']['address']:null}}</div>
            </div>
            <div class="right">
                <table>
                    <tr><td class="text-center">RS Trans#{{ $invoice['id']}}</td></tr>
                    @if($invoice['work_order_id'])
                    <tr><td class="text-center">RS WO#{{ $invoice['work_order_id']}}</td></tr>
                    @endif
                    <tr><td class="text-center">{{ date('M d, Y H:m a', strtotime($invoice->created_at))}}</td></tr>
                </table>
            </div>
        </div>
    </header>
    <footer>
        This site uses PBS. For more information on PBS text PBSINFO to (888) 401-5087.
    </footer>
    <main>
        <table class="clear-both table-content">
            <tr>
                <td class="w-50"><label>PAID BY</label></td>
                <td><label>DESTINATION</label></td>
            </tr>
            <tr>
              <td class="b-r">
                <div class="d-flex">
                    <div class="w-50">
                        <label>{{ $invoice['payer_name'] }}</label>
                        <p>{{ $invoice['payer_phone']?$invoice['payer_phone']:$invoice['payer_email'] }}</p>
                    </div>
                </td>
                <td class="b-l">    
                    <div class="w-50">
                        <label>{{ $invoice['location']['name'] }}</label>
                        <p>{!! $invoice['location']['address'] !!}</p>    
                    </div>
                  </div>
            </td>
            </tr>
            <tr><td class="text-center" colspan="2"><label>LINE ITEMS</label></td></tr>
            <tr>
                <td colspan="2" class="additional-info">
                    @foreach ($line_items as $item)
                    <div class="d-flex justify-content-between">
                        <span class="w-80">{{ $item->name }}</span>
                        <span class="w-20 text-right">${{ $item->cost }}</span>
                    </div>  
                    @endforeach
                    @foreach ($product_items as $item)
                    <div class="d-flex justify-content-between">
                        <span class="w-80">(1) {{ $item->name }}</span>
                        <span class="w-20 text-right">${{ $item->cost }}</span>
                    </div>  
                    @endforeach
                    
                </td>

            </tr>
            @if($invoice['comments'] )
            <tr><td class="text-center" colspan="2"><label>COMMENTS</label></td></tr>
            <tr>
                <td colspan="2" class="additional-info">{{ $invoice['comments'] }}</td>
            </tr>
            @endif
            <tr><td class="text-center" colspan="2"><label>RECEIPT DETAILS</label></td></tr>
      
            <tr>
              <td colspan="2" class="additional-info">
                <div class="d-flex justify-content-between">
                  <span>CLERK</span>
                  <span class="text-right">{{ $invoice['user']['name'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>PAYMENT METHOD</span>
                  <span class="text-right">{{ $invoice['type'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>GRAND TOTAL</span>
                  <span class="text-right"><strong>${{ $invoice['amount'] }}<strong></span>
                </div>
              </td>
            </tr>
            @if($invoice['files'])
            <tr><td class="text-center" colspan="2"><label>ATTACHMENTS</label></td></tr>
            <tr>
                <td colspan="2" class="attachments">
                  @foreach( $invoice['files'] as $item)
                  <div class="w-50 d-il text-center m-t100">
                    @if($item->type == 'pdf')
                    <a href="{{ $item->url }}" target="_blank" class="d-bl"><img src="{{ url('invoices/pdf-document.png') }}"/></a>
                    @else
                    <img src="{{ $item->url }}"/>
                    @endif
                  </div>
                  @endforeach
                </td>
            </tr>
            @endif
            @if($invoice['status'] > 2)
            <tr><td class="text-center" colspan="2"><label>PAID IN FULL</label></td></tr>
            <tr>
                <td colspan="2" class="text-center work-auth">
                  <strong class="d-block">No Refunds or Returns</strong>
                </td>
              </tr>
             @endif 
        </table>
    </main>
    
  </body>
</html>