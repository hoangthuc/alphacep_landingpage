<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WorkOrderTemplate;

class WorkOrderTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
            "name"=>"150/165",
            "template_description"=>"<p>
            Authorization to perform Maintenance and Repair Services on trucks, trailers, bus, RV and auto.
          </p>
          <p>
          Premier Breakdown Solutions is a breakdown management company whose purpose is to respond to emergency breakdowns of
          vehicles.
          </p>
          <p>
            Premier Breakdown Solutions will attempt to get our customers back on the road as quickly as possible. Please understand that
            not all vehicles can be repaired via roadside service and may need to be taken to a shop for further diagnosis. Also note that
            there will be no guarantees or warranties given on any roadside service. There will be absolutely no refunds on services
            completed.
            </p>
            <p>
            I authorize Premier Breakdown Solutions to perform the repair work described by a Premier Breakdown Solutions employee in a
            written or verbalized estimate utilizing necessary labor, parts and materials. I agree that Premier Breakdown Solutions is not
            responsible for loss or damage to the vehicle, or articles left in the vehicle, in case of theft, fire, or any other cause beyond their
            control. I agree that Premier Breakdown Solutions is not responsible for delays caused by unavailability of parts, or delay in parts
            shipments by the supplier or transporter. I grant Premier Breakdown Solutions employees permission to operate my vehicle for
            the purpose of testing and/or inspection. I understand that, if any closer analysis finds additional labor, parts or materials are
            necessary to complete the repair, I will be contacted for authorization.
            </p>
            <p>
              I acknowledge that this work authorization approved supplemental estimates. I agree that if I should halt repairs for any reason, I
              will be responsible for the cost of any and all repairs completed to that point, as well as the cost of the parts which are not
              returnable, or restocking fees charged to Premier Breakdown Solutions, if I choose not to purchase said parts outright. I am
              entitled to retain any parts I pay for that are not returnable to their vendors.
            </p>",
            "service_rates"=>"<p>Truck rate:</p>
            <p>Callout fee: $150.00</p>
            <p>Day Hourly Rate (2 hour minimum on site) : $165</p>
            <p>Plus drive time to and from the unit @ $165 hr</p>
            <p>Road Call Minimum Estimate : $682.43 plus credit card fee</p>",

            "additional_fees"=>"<p>3.5% CONVENIENCE FEE ON ALL CREDIT CARD TRANSACTIONS</p>
            <p>3% CHECK CONVENIENCE FEE</p>
            <p>CANCELATION FEE</p>
            <p>$350 ON ALL JOBS </p>",
            "credit_card_authorization"=>"<p>If paying by credit card, your signature on this form gives Premier Breakdown Solutions permission to debit your credit card
            account, on or after the indicated date, for the agreed upon services according to the terms outlined on this Work Order. This
            payment authorization is for the goods/services described herein on the indicated date. By signing this form, you certify that you
            are an authorized user of this credit card and that you will not dispute the payment with your credit card company, as long as the
            transaction corresponds to the terms indicated on this agreement. Please note that the credit card must bear the name of your
            company, or if a personal credit card, must match the name on your ID; proof of ID will be requested onsite.</p>
          <p>Please note that the charge may show up on your credit card statement as ROADSYNC, our payments partner.</p>
          <p>Thank you for giving Premier Breakdown Solutions the opportunity to serve you. We appreciate your business!</p>
          <p>Your satisfaction is important to us. If, for any reason, you are not satisfied with the services you receive, please contact Premier
            Breakdown Solutions immediately at 8884015087.</p>",
            "template_demo"=> url("templates/150-165.pdf")
            ],
            [
            "name"=>"185/185",
            "template_description"=>"<p>
            Authorization to perform Maintenance and Repair Services on trucks, trailers, bus, RV and auto.
          </p>
          <p>
          Premier Breakdown Solutions is a breakdown management company whose purpose is to respond to emergency breakdowns of
          vehicles.
          </p>
          <p>
            Premier Breakdown Solutions will attempt to get our customers back on the road as quickly as possible. Please understand that
            not all vehicles can be repaired via roadside service and may need to be taken to a shop for further diagnosis. Also note that
            there will be no guarantees or warranties given on any roadside service. There will be absolutely no refunds on services
            completed.
            </p>
            <p>
            I authorize Premier Breakdown Solutions to perform the repair work described by a Premier Breakdown Solutions employee in a
            written or verbalized estimate utilizing necessary labor, parts and materials. I agree that Premier Breakdown Solutions is not
            responsible for loss or damage to the vehicle, or articles left in the vehicle, in case of theft, fire, or any other cause beyond their
            control. I agree that Premier Breakdown Solutions is not responsible for delays caused by unavailability of parts, or delay in parts
            shipments by the supplier or transporter. I grant Premier Breakdown Solutions employees permission to operate my vehicle for
            the purpose of testing and/or inspection. I understand that, if any closer analysis finds additional labor, parts or materials are
            necessary to complete the repair, I will be contacted for authorization.
            </p>
            <p>
              I acknowledge that this work authorization approved supplemental estimates. I agree that if I should halt repairs for any reason, I
              will be responsible for the cost of any and all repairs completed to that point, as well as the cost of the parts which are not
              returnable, or restocking fees charged to Premier Breakdown Solutions, if I choose not to purchase said parts outright. I am
              entitled to retain any parts I pay for that are not returnable to their vendors.
            </p>",
            "service_rates"=>"<p>Truck rate:</p>
            <p>Callout fee: $185</p>
            <p>Day Hourly Rate (2 hour minimum on site) : $185hr</p>
            <p>Plus drive time to and from the unit @ $185 hr</p>
            <p>Road Call Minimum Estimated at $783.25 plus credit card fee</p>
            <p>Jump Start Flat Rate Service</p>",
            "additional_fees"=>"<p>3.5% CONVENIENCE FEE ON ALL CREDIT CARD TRANSACTIONS</p>
            <p>3% CHECK CONVENIENCE FEE</p>
            <p>CANCELATION FEE</p>
            <p>$350 ON ALL JOBS </p>",
            "credit_card_authorization"=>"<p>If paying by credit card, your signature on this form gives Premier Breakdown Solutions permission to debit your credit card
            account, on or after the indicated date, for the agreed upon services according to the terms outlined on this Work Order. This
            payment authorization is for the goods/services described herein on the indicated date. By signing this form, you certify that you
            are an authorized user of this credit card and that you will not dispute the payment with your credit card company, as long as the
            transaction corresponds to the terms indicated on this agreement. Please note that the credit card must bear the name of your
            company, or if a personal credit card, must match the name on your ID; proof of ID will be requested onsite.</p>
          <p>Please note that the charge may show up on your credit card statement as ROADSYNC, our payments partner.</p>
          <p>Thank you for giving Premier Breakdown Solutions the opportunity to serve you. We appreciate your business!</p>
          <p>Your satisfaction is important to us. If, for any reason, you are not satisfied with the services you receive, please contact Premier
            Breakdown Solutions immediately at 8884015087.</p>",
            "template_demo"=> url("templates/185-185.pdf")
            ],
            [
            "name"=>"185/225",
            "template_description"=>"<p>
            Authorization to perform Maintenance and Repair Services on trucks, trailers, bus, RV and auto.
          </p>
          <p>
          Premier Breakdown Solutions is a breakdown management company whose purpose is to respond to emergency breakdowns of
          vehicles.
          </p>
          <p>
            Premier Breakdown Solutions will attempt to get our customers back on the road as quickly as possible. Please understand that
            not all vehicles can be repaired via roadside service and may need to be taken to a shop for further diagnosis. Also note that
            there will be no guarantees or warranties given on any roadside service. There will be absolutely no refunds on services
            completed.
            </p>
            <p>
            I authorize Premier Breakdown Solutions to perform the repair work described by a Premier Breakdown Solutions employee in a
            written or verbalized estimate utilizing necessary labor, parts and materials. I agree that Premier Breakdown Solutions is not
            responsible for loss or damage to the vehicle, or articles left in the vehicle, in case of theft, fire, or any other cause beyond their
            control. I agree that Premier Breakdown Solutions is not responsible for delays caused by unavailability of parts, or delay in parts
            shipments by the supplier or transporter. I grant Premier Breakdown Solutions employees permission to operate my vehicle for
            the purpose of testing and/or inspection. I understand that, if any closer analysis finds additional labor, parts or materials are
            necessary to complete the repair, I will be contacted for authorization.
            </p>
            <p>
              I acknowledge that this work authorization approved supplemental estimates. I agree that if I should halt repairs for any reason, I
              will be responsible for the cost of any and all repairs completed to that point, as well as the cost of the parts which are not
              returnable, or restocking fees charged to Premier Breakdown Solutions, if I choose not to purchase said parts outright. I am
              entitled to retain any parts I pay for that are not returnable to their vendors.
            </p>",
            "service_rates"=>"<p>Truck rate:</p>
            <p>Callout fee: $185</p>
            <p>Day Hourly Rate (2 hour minimum on site) : $225hr</p>
            <p>Plus drive time to and from the unit @ $225 hr</p>
            <p>Road Call Minimum Estimated at $925.75 plus credit card fee</p>",
            "additional_fees"=>"<p>3.5% CONVENIENCE FEE ON ALL CREDIT CARD TRANSACTIONS</p>
            <p>3% CHECK CONVENIENCE FEE</p>
            <p>CANCELATION FEE</p>
            <p>$350 ON ALL JOBS </p>",
            "credit_card_authorization"=>"<p>If paying by credit card, your signature on this form gives Premier Breakdown Solutions permission to debit your credit card
            account, on or after the indicated date, for the agreed upon services according to the terms outlined on this Work Order. This
            payment authorization is for the goods/services described herein on the indicated date. By signing this form, you certify that you
            are an authorized user of this credit card and that you will not dispute the payment with your credit card company, as long as the
            transaction corresponds to the terms indicated on this agreement. Please note that the credit card must bear the name of your
            company, or if a personal credit card, must match the name on your ID; proof of ID will be requested onsite.</p>
          <p>Please note that the charge may show up on your credit card statement as ROADSYNC, our payments partner.</p>
          <p>Thank you for giving Premier Breakdown Solutions the opportunity to serve you. We appreciate your business!</p>
          <p>Your satisfaction is important to us. If, for any reason, you are not satisfied with the services you receive, please contact Premier
            Breakdown Solutions immediately at 8884015087.</p>",
            "template_demo"=> url("templates/185-225.pdf")
            ],
            [
            "name"=>"Towing WO",
            "template_description"=>"<p>
            Authorization to perform Maintenance and Repair Services on trucks, trailers, bus, RV and auto.
          </p>
          <p>
          Premier Breakdown Solutions is a repair company whose purpose is to respond to emergency breakdowns of vehicles.
          </p>
          <p>
            Premier Breakdown Solutions will attempt to get our customers back on the road as quickly as possible. Please understand that
            not all vehicles can be repaired via roadside service and may need to be taken to a shop for further diagnosis. Also note that
            there will be no guarantees or warranties given on any roadside service. There will be absolutely no refunds on services
            completed.
            </p>
            <p>
            I authorize Premier Breakdown Solutions to perform the repair work described by a Premier Breakdown Solutions employee in a
            written or verbalized estimate utilizing necessary labor, parts and materials. I agree that Premier Breakdown Solutions is not
            responsible for loss or damage to the vehicle, or articles left in the vehicle, in case of theft, fire, or any other cause beyond their
            control. I agree that Premier Breakdown Solutions is not responsible for delays caused by unavailability of parts, or delay in parts
            shipments by the supplier or transporter. I grant Premier Breakdown Solutions employees permission to operate my vehicle for
            the purpose of testing and/or inspection. I understand that, if any closer analysis finds additional labor, parts or materials are
            necessary to complete the repair, I will be contacted for authorization.
            </p>
            <p>
              I acknowledge that this work authorization approved supplemental estimates. I agree that if I should halt repairs for any reason, I
              will be responsible for the cost of any and all repairs completed to that point, as well as the cost of the parts which are not
              returnable, or restocking fees charged to Premier Breakdown Solutions, if I choose not to purchase said parts outright. I am
              entitled to retain any parts I pay for that are not returnable to their vendors.
            </p>",
            "service_rates"=>"<p>Truck rate:</p>
            <p>$595 Hr Port to Port</p>
            <p>Bus / RV rate:</p>
            <p>$695 Hr Port to Port</p>",
            "additional_fees"=>"<p>3.5% CONVENIENCE FEE ON ALL CREDIT CARD TRANSACTIONS</p>
            <p>3% CHECK CONVENIENCE FEE</p>",
            "credit_card_authorization"=>"<p>If paying by credit card, your signature on this form gives Premier Breakdown Solutions permission to debit your credit card
            account, on or after the indicated date, for the agreed upon services according to the terms outlined on this Work Order. This
            payment authorization is for the goods/services described herein on the indicated date. By signing this form, you certify that you
            are an authorized user of this credit card and that you will not dispute the payment with your credit card company, as long as the
            transaction corresponds to the terms indicated on this agreement. Please note that the credit card must bear the name of your
            company, or if a personal credit card, must match the name on your ID; proof of ID will be requested onsite.</p>
          <p>Please note that the charge may show up on your credit card statement as ROADSYNC, our payments partner.</p>
          <p>Thank you for giving Premier Breakdown Solutions the opportunity to serve you. We appreciate your business!</p>
          <p>Your satisfaction is important to us. If, for any reason, you are not satisfied with the services you receive, please contact Premier
            Breakdown Solutions immediately at 8884015087.</p>",
            "template_demo"=> url("templates/towing-wo.pdf")
            ],
        ];
        foreach($list as $item){
            WorkOrderTemplate::create([ 
                "template_name"=>$item['name'], 
                "template_description"=> $item['template_description'],
                "template_excerpt"=> fake()->text(50),
                "service_rates"=> $item['service_rates'],
                "additional_fees"=> $item['additional_fees'],
                "credit_card_authorization"=> $item['credit_card_authorization'],
                "template_demo"=> $item['template_demo'],
            ]);
        }
    }
}
