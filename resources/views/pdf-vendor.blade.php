<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>{{ $vendor['public_id'].$vendor['id']}}.pdf</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/style.pdf.css">
  </head>
  <body>
    <header>
        <div class="header">
            <div class="left" >
                <img src="{{ url('/assets/images/premier-logo.png')}}"/>
                <strong class="d-block">Premier Breakdown Solutions</strong>
                <div>PBS ID: 66554</div>
                <div>Tax ID: 87-3228484</div>
                <div>Phone: 8884015087</div>
                <div>415 E Airport Fwy Suite 450Irving  TX, 75062</div>
            </div>
            <div class="right">
                <table>
                    <tr><td>Customer Authorization</td></tr>
                    <tr><td class="text-center">{{ date('M d, Y H:m a', strtotime($vendor->created_at))}}</td></tr>
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
              <td><label>Carrier Name</label><span>{{ $vendor['carrier_name'] }}</span></td>
              <td><label>Contact Name</label><span>{{ $vendor['contact_name'] }}</span></td>
            </tr>
            <tr>
              <td><label>Contact Phone # or Email</label><span>{{ isset($vendor['contact_phone'])?$vendor['contact_phone']:$vendor['contact_email'] }}</span></td>
              <td><label>Driver Name</label><span>{{ $vendor['driver_name'] }}</span></td>
            </tr>
            <tr>
              <td><label>Driver Phone # or Email</label><span>{{ isset($vendor['driver_phone'])?$vendor['driver_phone']: $vendor['driver_email']  }}</span></td>
              <td></td>
            </tr>
      
            <tr><td class="text-center" colspan="2"><label>ADDITIONAL INFO</label></td></tr>
      
            <tr>
              <td colspan="2" class="additional-info">
                <div class="d-flex justify-content-between">
                  <span>First And Last Name</span>
                  <span class="text-right">{{ $vendor['first_name'] }} {{ $vendor['last_name'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Company Name</span>
                  <span class="text-right">{{ $vendor['company_name'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Company Address</span>
                  <span class="text-right">{{ $vendor['company_address'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Email Address</span>
                  <span class="text-right">{{ $vendor['email'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Company Phone Number</span>
                  <span class="text-right">{{ $vendor['phone_number'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>EIN Number</span>
                  <span class="text-right">{{ $vendor['ein_number'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Number Of Service Trucks</span>
                  <span class="text-right">{{ $vendor['number_of_service_trucks'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Computer Diagnostic</span>
                  <span class="text-right">{{ $vendor['computer_diagnostic']?'Yes':'No' }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Offers Heavy Duty Towing</span>
                  <span class="text-right">{{ $vendor['offers_heavy_duty_towing']?'Yes':'No' }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Offers Tire Service</span>
                  <span class="text-right">{{ $vendor['offers_tire_service']?'Yes':'No' }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Day Service Call Rate</span>
                    <span class="text-right">{{ $vendor['day_service_call_rate'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Day Hourly Rate</span>
                    <span class="text-right">{{ $vendor['day_hourly_rate'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Day Hourly Minimum</span>
                    <span class="text-right">{{ $vendor['day_hourly_minimum'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Day Drive Time Rate</span>
                    <span class="text-right">{{ $vendor['day_drive_time_rate'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Night Service Call Rate</span>
                    <span class="text-right">{{ $vendor['night_service_call_rate'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Night Hourly Rate</span>
                    <span class="text-right">{{ $vendor['night_hourly_rate'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Night Hourly Minimum</span>
                    <span class="text-right">{{ $vendor['night_hourly_minimum'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Night Drive Time Rate</span>
                    <span class="text-right">{{ $vendor['night_drive_time_rate'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Parts Markup</span>
                    <span class="text-right">{{ $vendor['parts_markup'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Any Addtional Pricing</span>
                    <span class="text-right">{{ $vendor['additional_pricing'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Bank Name</span>
                    <span class="text-right">{{ $vendor['bank_name'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Accounting Number</span>
                    <span class="text-right">{{ $vendor['accounting_number'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Routing Number</span>
                    <span class="text-right">{{ $vendor['routing_number'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Would you like information about our parts department</span>
                    <span class="text-right">{{ $vendor['information_about_parts_department']?'Yes':'No' }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Would you like information on our prefered credit card processor</span>
                    <span class="text-right">{{ $vendor['information_on_preferred_credit_card_processor']?'Yes':'No'  }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Would you like more information on our Breakdown Software</span>
                    <span class="text-right">{{ $vendor['information_on_breakdown_software']?'Yes':'No'  }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Vendor Grade</span>
                    <span class="text-right">{{ $vendor['vendor_grade'] }}</span>
                </div>
                  
              </td>
            </tr>
        </table>
        <p style="page-break-after: always;"></p>
        <p style="page-break-after: never;"> </p>
        <table class="table-content page-2">
            <tr><td class="text-center" colspan="2"><label>WORK AUTHORIZATION</label></td></tr>
            <tr>
              <td colspan="2" class="work-auth">
                <strong class="d-block">PLEASE SIGN THIS VENDOR REGISTRATION AND RETURN AS SOON AS POSSIBLE.</strong>
                <p>
                  Authorization to perform Maintenance and Repair Services on trucks, trailers, bus, RV and auto.
                </p>
                <p>
                    Premier Breakdown Solutions and Vendor are entering into an agreement, therefore the Vendor is hereby an agent of said
                    company Premier Breakdown Solutions.
                </p>
                <p>
                    Premier Breakdown Solutions is a third party provider. No pricing is to be discussed with Premier Breakdown Solutions customer
                    during any time before or after the repair. Please do not give a copy of the invoice to the driver.
                  </p>
                  <p>
                    This Agreement (including the Attachments hereto) contains the entire understanding of the parties hereto and cancels all prior
                    written and oral agreements in principle, understandings or other agreements among the parties. This Agreement may be
                    amended or modified only by a written instrument executed by each of the parties hereto.
                  </p>
                  <p>
                    This Agreement shall be construed in accordance with the laws of the state of where the services are conducted. The parties
hereto agree that in the event it should become necessary to institute litigation for enforcement of any term(s) herein, the court
having jurisdiction may award all attorney fees, court costs and other court costs reasonably related to such litigation to the
prevailing party. Venue of all such litigation shall be in the state of where the services are conducted.
                  </p>
                  <p>
                    The parties agree that Vendor shall perform all work hereunder in a workmanlike manner and that any parts, equipment,
supplies or other goods placed on the vehicles belonging to Premier Breakdown Solutions customers shall be of good quality
and appropriate to the use of the vehicle unless otherwise disclosed to and approved in writing by Premier Breakdown Solutions
or its customer. Vendor shall be responsible directly to Premier Breakdown Solutions customer for any damage or other injury to
Premier Breakdown Solutions customer's or any third-party caused by Vendorâ€TMs failure to properly perform services and
repairs to the customerâ€TMs vehicle. Vendor agrees to fully cooperate with Premier Breakdown Solutions and its customers to
resolve any disputes relating to Vendorâ€TMs work. Vendor agrees to save harmless, defend and indemnify Premier Breakdown
Solutions and the officers, directors, member(s), agents and employees of Premier Breakdown Solutions from and against any
and all claims, damages, causes of action, suits and liabilities of every kind or nature, including all expenses of litigation, court
cost and attorneyâ€TMs fees, in any way arising directly or indirectly out of (i) injury to or death of any person, (ii) damages to or
destruction of property of any person cause by the act(s) or omission(s) of or attributable to Vendor, or its owners, officers, or
employees.
                  </p>
                  <p>
                    Job Procedures
                  </p>
                  <p>
                    1.) Premier Breakdown Solutions requires before and after pictures for all services rendered (including parts, damage, decals).
Also required is a clear picture of the unit number being serviced. Updated estimates/pics are needed for approval if repairs
exceed cap set. ******** WARNING ******PLEASE DO NOT START FULL REPAIR BEFORE ESTIMATE/ PIC APPROVAL OR
IT CAN DELAY PAYOUT!!!
                  </p>
                  <p>
                    2.) .) Upon completion of its service to Premier Breakdown Solutions customers, Preferred Partner will promptly submit a report
to Premier Breakdown Solutions of the service provided and invoice for its services after the job is completed.
                  </p>
                  <p>
                    Please Send Invoice to invoice@Premierbreakdown.com
                  </p>
                  <p>
                    (Payments Methods: Virtual Credit Card, Wire Or ACH)
                  </p>
                  <p>
                    *Any issues or concerns with services you are providing please reach out to (888) 287-6707 for immediate assistance by an
agent. Forward Diesel Repair requires before and after pictures for all services rendered
(including parts, damage, decals). Also required is a clear picture of the unit number being serviced)
                  </p>
                  <p>
                    ESTIMATES are required prior to service for all units. Pictures and Estimates can be sent to
Estimates@PremierBreakdown.com. Please have Ref #/ Unit # being serviced in subject line for fastest response time
                  </p>
                  <p>
                    TOWS require pictures of the unit number(s) being transported. In addition, tow vendor must take pictures of any damage that
occurred to the units prior to tow company arrival for record. All Truck driveshafts should be
disconnected prior to towing unit, unless loaded on a trailer for transport INVOICES and final Pictures should be sent to
Invoice@PremierBreakdown.com
                  </p>
              </td>
            </tr>
        </table>
        <p style="page-break-after: always;"></p>
        <p style="page-break-after: never;"> </p>
        <table class="clear-both table-content page-2">
            <tr>
              <td colspan="2">
                <p>
                    Vendor Relations:
                  </p>
                  <p>
Please contact Michael Fletcher our Vendor Relations Manager (469) 729-8826 or Email at Mfletcher@premierbreakdown.com,
and vendors@premierbreakdown.com
                  </p>
                  <p>
                    Accounting Department:
                  </p>
                  <p>
                    Issues/questions with billing please call (469) 729-8394 or email ap@PremierBreakdownSolutions.com, have your reference
and/or work order number ready
                  </p>
                  <p>
                    Thank you for giving Premier Breakdown Solutions the opportunity to serve you. We appreciate your business!
                </p>
                  <p>
                    Your satisfaction is important to us. If, for any reason, you are not satisfied with the services you receive, please contact Premier
                    Breakdown Solutions immediately at (888) 401-5087 #5
                  </p>
              </td>
            </tr>
            <tr>
              <td colspan="2" class="text-center font-weight-bold">SIGNATURE</td>
            </tr>
            <tr>
              <td colspan="2">
                <p class="empty-sign">
                    @if($vendor['signature'])
                    <img src="{{ $vendor['signature'] }}"/>
                    @endif
                </p>
                </td>
            </tr>
          </table>
      
    </main>
    
  </body>
</html>