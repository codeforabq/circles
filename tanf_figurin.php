<?php

//Income Variables
//$TotalEarnedIncome
//$TotalUnEarnedIncome
//$TotalIncome

$cl_stateinits=$_POST['cl_stateinits'];
$twentyone_or_older_PTcheck=$_POST['twentyone_or_older_PTcheck'];
$twentyone_or_older_FTcheck=$_POST['twentyone_or_older_FTcheck'];
$twentyone_or_older_Expcheck=$_POST['twentyone_or_older_Expcheck'];
$ChildcareAmount=$_POST['ChildcareAmount'];

if ($twentyone_or_older_PTcheck=="Yes"){$cl_adults_PT=$_POST['cl_adults_PT'];}else{$cl_adults_PT="0";}
if ($twentyone_or_older_FTcheck=="Yes"){$cl_adults_FT=$_POST['cl_adults_FT'];}else{$cl_adults_FT="0";}
if ($twentyone_or_older_Expcheck=="Yes"){$incomeexpenses_amount=$_POST['WorkExpenseAmount'];}else{$incomeexpenses_amount="0";}

$deduct_spousesupport_amount=$_POST['SpouseSupportPaidAmount'];
$deduct_childsupport_amount=$_POST['ChildSupportPaidAmount'];

$children_over2=0;
$children_under2=0;

if (isset($_POST['cl_child1_years'])){if ($_POST['cl_child1_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}
if (isset($_POST['cl_child2_years'])){if ($_POST['cl_child2_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}
if (isset($_POST['cl_child3_years'])){if ($_POST['cl_child3_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}
if (isset($_POST['cl_child4_years'])){if ($_POST['cl_child4_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}
if (isset($_POST['cl_child5_years'])){if ($_POST['cl_child5_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}
if (isset($_POST['cl_child6_years'])){if ($_POST['cl_child6_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}
if (isset($_POST['cl_child7_years'])){if ($_POST['cl_child7_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}
if (isset($_POST['cl_child8_years'])){if ($_POST['cl_child8_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}
if (isset($_POST['cl_child9_years'])){if ($_POST['cl_child9_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}
if (isset($_POST['cl_child10_years'])){if ($_POST['cl_child10_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}
if (isset($_POST['cl_child11_years'])){if ($_POST['cl_child11_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}
if (isset($_POST['cl_child12_years'])){if ($_POST['cl_child12_years']>=2){$children_over2=$children_over2+1;}else{$children_under2=$children_under2+1;}}

if (isset($_POST['cl_less_than_thirteen'])){$cl_less_than_thirteen=$_POST['cl_less_than_thirteen'];}else{$cl_less_than_thirteen=0;}
if (isset($_POST['cl_thirteen_to_twenty'])){$cl_thirteen_to_twenty=$_POST['cl_thirteen_to_twenty'];}else{$cl_thirteen_to_twenty=0;}
if (isset($_POST['ChildSupportReceived'])){$child_support_received_amount=$_POST['ChildSupportReceived'];}else{$child_support_received_amount=0;}
if (isset($_POST['MedicalElderlyAmount'])){$medical_elderly_amount=$_POST['MedicalElderlyAmount'];}else{$medical_elderly_amount=0;}
if (isset($_POST['13to18_check'])){$teenager_count=$_POST['13to18_check'];}else{$teenager_count=0;}
if (isset($_POST['CheckingAccountBal'])){$Checking_Account_Balance=$_POST['CheckingAccountBal'];}else{$Checking_Account_Balance=0;}
$checking_account_bal = $_POST['CheckingAccountBal'];
$savings_account_bal = $_POST['SavingsAccountBal'];
$EVvehicle1=$_POST['EVvehicle1'];
$EVothervehicle=$_POST['EVothervehicle'];
$total_of_vehicles=$EVvehicle1+$EVothervehicle;
$EVpersonal=$_POST['EVpersonal'];
$EVnonResi=$_POST['EVnonResi'];
$EVallCountable=$_POST['EVallCountable'];
$elderly_disabled_home=$_POST['cl_family_over60_check'];
$every_member_benefits=$_POST['cl_family_All_onBenefits_check'];

//***INCOME AND DEDUCTIONS SECTION***

//WORK DEDUCTIONS
      $incadj_sql = "SELECT income_adjust_firstadult,income_adjust_secondadult FROM state_data WHERE state_init=\"".$cl_stateinits."\";";
      $incadj_result = $dbconn->query($incadj_sql);
      while ($incadj_row = $incadj_result->fetch_assoc())
      {
        if (($cl_adults_PT>0)||($cl_adults_FT>0)){$first_adult_deduct=$incadj_row['income_adjust_firstadult'];}else{$first_adult_deduct="0";}
        if ($cl_adults_PT+$cl_adults_FT>1){$second_adult_deduct=$incadj_row['income_adjust_secondadult'];}else{$second_adult_deduct="0";}
      }

//DEDUCT CHILD SUPPORT
      $deductcs_sql = "SELECT deduct_childsupport_paid FROM state_data WHERE state_init=\"".$cl_stateinits."\";";
      $deductcs_result = $dbconn->query($deductcs_sql);
      while ($deductcs_row = $deductcs_result->fetch_assoc())
      {
        $deduct_childsupport_paid=$deductcs_row['deduct_childsupport_paid'];
        if ($deduct_childsupport_paid=="FALSE"){$deduct_childsupport_amount="0";}
      }

//DEDUCT EXPENSES PAID FOR INCOME
      $deductep_sql = "SELECT deduct_expensespaid_forincome FROM state_data WHERE state_init=\"".$cl_stateinits."\";";
      $deductep_result = $dbconn->query($deductep_sql);
      while ($deductep_row = $deductep_result->fetch_assoc())
        {
          $deduct_expensespaid_forincome=$deductep_row['deduct_expensespaid_forincome'];
          if ($deduct_expensespaid_forincome=="FALSE"){$deduct_incomeexpenses_amount="0";}else{$deduct_incomeexpenses_amount=$incomeexpenses_amount;}
        }

//DEDUCT CHILDCARE PAID Amount
//echo "<br><br>CL_ADULTS_FT == ".$cl_adults_FT."<br><br>";
//echo "CL_ADULTS_PT == ".$cl_adults_PT."<br><br>";
//echo "ChildcareAmount == ".$ChildcareAmount."<br><br>";


      if ($ChildcareAmount>0)
      {
        if ($cl_adults_FT>0)
        {
          if ($cl_adults_FT>2){$cl_adults_FT=2;}

          $deductccft_sql = "SELECT tanf_ftwork_dependcareunder2,tanf_ftwork_dependcareover2 FROM state_data WHERE state_init=\"".$cl_stateinits."\";";
          $deductccft_result = $dbconn->query($deductccft_sql);
          while ($deductccft_row = $deductccft_result->fetch_assoc())
            {
              $deductFT_childcareunder2_amount=$deductccft_row['tanf_ftwork_dependcareunder2'];
              $deductFT_childcareover2_amount=$deductccft_row['tanf_ftwork_dependcareover2'];
              $childcare_FTmax_deduction=(($deductFT_childcareunder2_amount*$children_under2)+($deductFT_childcareover2_amount*$children_over2))*$cl_adults_FT;
            }
      }
      else {$childcare_FTmax_deduction=0;}

      if ($cl_adults_PT>0)
      {
        if ($cl_adults_PT>2){$cl_adults_PT=2;}
        $deductccpt_sql = "SELECT tanf_ptwork_dependcareunder2,tanf_ptwork_dependcareover2 FROM state_data WHERE state_init=\"".$cl_stateinits."\";";
        $deductccpt_result = $dbconn->query($deductccpt_sql);
        while ($deductccpt_row = $deductccpt_result->fetch_assoc())
          {
            $deductPT_childcareunder2_amount=$deductccpt_row['tanf_ptwork_dependcareunder2'];
            $deductPT_childcareover2_amount=$deductccpt_row['tanf_ptwork_dependcareover2'];
            $childcare_PTmax_deduction=(($deductPT_childcareunder2_amount*$children_under2)+($deductPT_childcareover2_amount*$children_over2))*$cl_adults_PT;
          }
      }
      else {$childcare_PTmax_deduction=0;}
    }
      else{$childcare_PTmax_deduction=0; $childcare_FTmax_deduction=0;}

$childcare_max_deduction=min($ChildcareAmount,($childcare_PTmax_deduction+$childcare_FTmax_deduction));

//DEDUCT CHILD SUPPORT RECEIVED
      $deductcsr_sql = "SELECT income_adjust_childonesuppdeduct,income_adjust_childtwosuppdeduct FROM state_data WHERE state_init=\"".$cl_stateinits."\";";
      $deductcsr_result = $dbconn->query($deductcsr_sql);
      while ($deductcsr_row = $deductcsr_result->fetch_assoc())
        {
          if ($cl_less_than_thirteen+$cl_thirteen_to_twenty==1)
          {
            $child_support_received1_amount=$deductcsr_row['income_adjust_childonesuppdeduct'];
            $child_support_received1=min($child_support_received_amount,$child_support_received1_amount);
          }
            else{$child_support_received1_amount=0;}

          if ($cl_less_than_thirteen+$cl_thirteen_to_twenty>1)
          {
            $child_support_received2_amount=$deductcsr_row['income_adjust_childonesuppdeduct'];
            $child_support_received2=min($child_support_received_amount,$child_support_received2_amount);
          }
            else{$child_support_received2_amount=0;}
        }
  $child_support_deduct_amount = $child_support_received1_amount+$child_support_received2_amount;

//DEDUCT MEDICAL FOR ELDERLY-DISABLED

      $deductelddis_sql = "SELECT medical_elderly_disabled_allowed FROM state_data WHERE state_init=\"".$cl_stateinits."\";";
      $deductelddis_result = $dbconn->query($deductelddis_sql);
      while ($deductelddis_row = $deductelddis_result->fetch_assoc())
      {
        if ($deductelddis_row['medical_elderly_disabled_allowed']=="TRUE")
        {
          $medical_elderly_disabled_amount=$medical_elderly_amount;
        }
          else{$medical_elderly_disabled_amount=0;}
      }

//DEDUCT EARNED INCOME DISREGARD

      $deducteid_sql = "SELECT income_adjust_eidisregard FROM state_data WHERE state_init=\"".$cl_stateinits."\";";
      $deducteid_result = $dbconn->query($deducteid_sql);
      while ($deducteid_row = $deducteid_result->fetch_assoc())
      {
        $income_adjust_eidisregard=$deducteid_row['income_adjust_eidisregard'];
        $earned_income_adjustment=$TotalEarnedIncome*$income_adjust_eidisregard;
          $earned_income_disregard_amount=max(0,$earned_income_adjustment);
      }

$sumIncomeDeductions=$TotalIncome-($first_adult_deduct+$second_adult_deduct+$deduct_childsupport_amount+$deduct_incomeexpenses_amount+$childcare_max_deduction+$child_support_received_amount+$child_support_deduct_amount+$medical_elderly_disabled_amount+$earned_income_disregard_amount);

$CountableIncome=max(0,$sumIncomeDeductions);


//***INCOME AND CHILD TEST SECTION***

//ADDITIONAL FAMILY AMOUNT FOR MORE THAN 8 HOUSEHOLD MEMBERS

      if ($people_count>8)
      {
        $deductaddmembers_sql = "SELECT DISTINCT each_addtional_member FROM fpig WHERE 1;";
        $deductaddmembers_result = $dbconn->query($deductaddmembers_sql);
        while ($deductaddmembers_row = $deductaddmembers_result->fetch_assoc())
        {
          $additional_family_amount=$deductaddmembers_row['each_addtional_member']*($people_count-8);
        }
      }
        else {$additional_family_amount=0;}

//GROSS INCOME LIMIT

      $gross_income_limit_amount=($fpig100*.85)+$additional_family_amount;

      if ($TotalIncome<=$gross_income_limit_amount){$gross_income_test="TRUE";}else{$gross_income_test="FALSE";}

      if ($cl_less_than_thirteen+$teenager_count>0){$child_test="TRUE";}else{$child_test="FALSE";}

//STANDARD OF NEED LOOKUP

      if ($people_count<=8){$family_size_lookup=$people_count;}else{$family_size_lookup=8;}
      if ($people_count>8){$add_family_lookup=$people_count-8;}else{$add_family_lookup=0;}
      $standard_of_need_total = $fpig100+$additional_family_amount;
      if ($CountableIncome<$standard_of_need_total){$standard_of_need_test="TRUE";}else{$standard_of_need_test="FALSE";}

//ELIGIBILITY BASED ON RESOURCES

      $eligibleresources_sql = "SELECT vehicle_equity,vehicle_resource_exclusion,misc_vehicles FROM state_data WHERE state_init=\"".$cl_stateinits."\";";
      $eligibleresources_result = $dbconn->query($eligibleresources_sql);
      while ($eligibleresources_row = $eligibleresources_result->fetch_assoc())
      {
        if ($eligibleresources_row['vehicle_equity']=1)
        {
          $Total_Asset_Value=$checking_account_bal+$savings_account_bal+$EVvehicle1+$EVothervehicle+$EVpersonal+$EVnonResi+$EVallCountable;
          $Vehicle_Resource_Exclusion_Amount=$eligibleresources_row['vehicle_equity'];
          //Total of vehicles is $total_of_vehicles
          $Vehicle_Adjustment=min($total_of_vehicles,$Vehicle_Resource_Exclusion_Amount);
          $Adjusted_Value_of_Assets=$Total_Asset_Value-$Vehicle_Adjustment;

          $resourcelimit_sql = "SELECT tanf_resourcemax FROM state_data WHERE state_init=\"".$cl_stateinits."\";";
          $resourcelimit_result = $dbconn->query($resourcelimit_sql);
          while ($resourcelimit_row = $resourcelimit_result->fetch_assoc())
          {
            $Resource_Limit_Amount=$resourcelimit_row['tanf_resourcemax'];
          }
          if (($Resource_Limit_Amount>$Adjusted_Value_of_Assets)||($Resource_Limit_Amount<0)){$Resource_Test_Passed="TRUE";}else{$Resource_Limit_Amount="FALSE";}
        }
        else{$Resource_Test_Passed="TRUE";}
      }

//MONTHLY BENEFIT
      $monthlybenefit_sql = "SELECT * FROM fpig WHERE house_members=$people_count;";
      $monthlybenefit_result = $dbconn->query($monthlybenefit_sql);
      while ($monthlybenefit_row = $monthlybenefit_result->fetch_assoc())
      {
        $Monthly_Benefit_Amount=$monthlybenefit_row['nmw_cach_net_income']-$monthlybenefit_row['nmw_budgetary_adjustment'];
        $Monthly_Benefit_AddFam=($monthlybenefit_row['each_additional_nmw_cach']-$monthlybenefit_row['each_additional_nmw_budgetary'])*$add_family_lookup;
        $Total_MaxMonthly_Benefit=$Monthly_Benefit_Amount+$Monthly_Benefit_AddFam;
      }
      $Monthly_Assistance_Payment=max(($Total_MaxMonthly_Benefit-$CountableIncome),0);

      $statesminimum_sql = "SELECT tanf_minsubsidy FROM state_data WHERE state_init=\"".$cl_stateinits."\";";
      $statesminimum_result = $dbconn->query($statesminimum_sql);
      while ($statesminimum_row = $statesminimum_result->fetch_assoc())
      {
        $States_Minimum_Payment=$statesminimum_row['tanf_minsubsidy'];
      }

      if(($gross_income_test=="TRUE")&&($child_test=="TRUE")&&($standard_of_need_test=="TRUE")&&($Resource_Test_Passed=="TRUE"))
        {
          if ($Monthly_Assistance_Payment>=$States_Minimum_Payment)
          {
          $Monthly_TANF_Subsidy=$Monthly_Assistance_Payment;
          }
          else{$Monthly_TANF_Subsidy=0;}
        }
        else{$Monthly_TANF_Subsidy=0;}

    $fpig85familysize=$fpig100*.85;
?>
