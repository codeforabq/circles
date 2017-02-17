<?php
    echo "<table border=\"1\">
    <tr><td>KEY</td><td>VALUE</td></tr>";
    $h=0;
    $i=0;
    foreach ($_POST as $key => $value) {
      if ($value!="")
      {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
        $h++;
      }
        $i++;
    }
    echo "<tr><td>Total InFields: </td><td>$h</td></tr>";
    echo "<tr><td>Total Fields: </td><td>$i</td></tr></table>";
?>

<?php
//PLACEHOLDER FOR FIGURIN' PARTS . . .

//Cost of Living
//SELECT == type_name, adults.working.children
//FROM == expense_allowances
//WHERE == county_name=cl_county AND city_name=cl_city AND adults.working.children == a.$a.w.$w.c.$c == adults.number of adults.working.number working.children.number of children
//echo "<br>Cost of Living == ".$costofliving."<br>";
//echo "<br><br>";
//echo "SELECT type_name, ".$awc." FROM expense_allowances WHERE county_name=\"".$county."\" AND state_name=\"".$state."\";";
echo "<br><br>";
//echo "In a home with ".$adults." adults where ".$working." are working and have ".$children." children.<br><br>";
echo "<table border=\"1\">";
echo "<tr><td colspan=2>SNAP/TANF calculations</td></tr>";
echo "<tr><td>Gross Income Limit Amount:</td><td>".number_format($gross_income_limit_amount)."</td></tr>";
echo "<tr><td>Vehicle Equity Allowance:</td><td>".number_format($vehicle_equity_allowed)."</td></tr>";
echo "<tr><td>Total Value of Assets:</td><td>".number_format($total_value_assets)."</td></tr>";
echo "<tr><td>Adjusted Value of Assets:</td><td>".number_format($adjusted_asset_value)."</td></tr>";
echo "<tr><td>Resource Limit Amount:</td><td>".number_format($resource_limit_amount)."</td></tr>";
echo "<tr><td>First Adult Deduction:</td><td>".number_format($first_adult_deduct)."</td></tr>";
echo "<tr><td>Second Adult Deduction:</td><td>".number_format($second_adult_deduct)."</td></tr>";
echo "<tr><td>Adults with Parttime Work:</td><td>".number_format($cl_adults_PT)."</td></tr>";
echo "<tr><td>Adults with Fulltime Work:</td><td>".number_format($cl_adults_FT)."</td></tr>";
echo "<tr><td>Childcare Paid:</td><td>".number_format($ChildcareAmount)."</td></tr>";
echo "<tr><td>Adults Fulltime Work Childcare Under 2 Deduct Amount:</td><td>".number_format($deductFT_childcareunder2_amount)."</td></tr>";
echo "<tr><td>Adults Fulltime Work Childcare 2 and Over Deduct Amount:</td><td>".number_format($deductFT_childcareover2_amount)."</td></tr>";
echo "<tr><td>Children 2 and Over:</td><td>".number_format($children_over2)."</td></tr>";
echo "<tr><td>Children Under 2:</td><td>".number_format($children_under2)."</td></tr>";
echo "<tr><td>Childcare Fulltime Deduction:</td><td>".number_format($childcare_FTmax_deduction)."</td></tr>";
if (isset($deductPT_childcareunder2_amount)){echo "<tr><td>Adults Parttime Work Childcare Under 2 Deduct Amount:</td><td>".number_format($deductPT_childcareunder2_amount)."</td></tr>";}
if (isset($deductPT_childcareover2_amount)){echo "<tr><td>Adults Parttime Work Childcare 2 and Over Deduct Amount:</td><td>".number_format($deductPT_childcareover2_amount)."</td></tr>";}
echo "<tr><td>Childcare Parttime Deduction:</td><td>".number_format($childcare_PTmax_deduction)."</td></tr>";
echo "<tr><td>Total Income:</td><td>".number_format($TotalIncome)."</td></tr>";
echo "<tr><td>Maximum Childcare Deduction:</td><td>".number_format($childcare_max_deduction)."</td></tr>";
echo "<tr><td>Earned Income Disregard:</td><td>".number_format($earned_income_disregard_amount)."</td></tr>";
echo "<tr><td>Sum Income Deductions:</td><td>".number_format($sumIncomeDeductions)."</td></tr>";
echo "<tr><td>Countable Income:</td><td>".number_format($CountableIncome)."</td></tr>";
echo "<tr><td>Number of Household Members:</td><td>".number_format($people_count)."</td></tr>";
echo "<tr><td>Additional Family Amount:</td><td>".number_format($additional_family_amount)."</td></tr>";
echo "<tr><td>Gross Income Limit Amount:</td><td>".number_format($gross_income_limit_amount)."</td></tr>";
echo "</table>";

echo "<br><br>";

echo "<table border=\"1\">";
echo "<tr><td colspan=2>TANF RESULTS</td></tr>";
echo "<tr><td>Gross Income:</td><td>".number_format($TotalIncome)."</td></tr>";
echo "<tr><td>First Adult Deductions:</td><td>".number_format($first_adult_deduct)."</td></tr>";
echo "<tr><td>Second Adult Deductions:</td><td>".number_format($second_adult_deduct)."</td></tr>";
echo "<tr><td>Child Support Paid:</td><td>".number_format($deduct_childsupport_amount)."</td></tr>";
echo "<tr><td>Income Expenses Paid:</td><td>".number_format($deduct_incomeexpenses_amount)."</td></tr>";
echo "<tr><td>Dependent Care Cost:</td><td>".number_format($childcare_max_deduction)."</td></tr>";
echo "<tr><td>Child Support Received for 1 Child:</td><td>".number_format($child_support_received1_amount)."</td></tr>";
echo "<tr><td>Child Support Received for 2 or more Children:</td><td>".number_format($child_support_received2_amount)."</td></tr>";
echo "<tr><td>Medical Expenses for Elderly/Disabled:</td><td>".number_format($medical_elderly_disabled_amount)."</td></tr>";
echo "<tr><td>Earned Income Disregard:</td><td>".number_format($earned_income_disregard_amount)."</td></tr>";
echo "<tr><td>Countable Income:</td><td>".number_format($CountableIncome)."</td></tr>";
echo "<tr><td>Family Size Lookup:</td><td>".$fpig85familysize."</td></tr>";
echo "<tr><td>Additional Family Amount:</td><td>".number_format($additional_family_amount)."</td></tr>";
echo "<tr><td>Gross Income Limit Amount:</td><td>".number_format($gross_income_limit_amount)."</td></tr>";
echo "<tr><td>Gross Income Test:</td><td>".$gross_income_test."</td></tr>";
echo "<tr><td>Child Test:</td><td>".$child_test."</td></tr>";
echo "<tr><td>Family Size 8 or less:</td><td>".$family_size_lookup."</td></tr>";
echo "<tr><td>Additional Family Size >8:</td><td>".$add_family_lookup."</td></tr>";
echo "<tr><td>Standard of Need up to 8 Total:</td><td>".number_format($fpig100)."</td></tr>";
echo "<tr><td>Standard of Need >8 Total:</td><td>".number_format($additional_family_amount)."</td></tr>";
echo "<tr><td>Standard of Need Total:</td><td>".number_format($standard_of_need_total)."</td></tr>";
echo "<tr><td>Countable Income:</td><td>".number_format($CountableIncome)."</td></tr>";
echo "<tr><td>Standard of Need Test:</td><td>".$standard_of_need_test."</td></tr>";
echo "<tr><td>Eligibility Based on Resources:</td><td>EXCLUDED</td></tr>";
echo "<tr><td>Eligibity Test:</td><td>".$Resource_Test_Passed."</td></tr>";
echo "<tr><td>Monthly Benefit up to 8:</td><td>".number_format($Monthly_Benefit_Amount)."</td></tr>";
echo "<tr><td>Monthly Benefit >8:</td><td>".number_format($Monthly_Benefit_AddFam)."</td></tr>";
echo "<tr><td>Total Monthly Benefit:</td><td>".number_format($Total_MaxMonthly_Benefit)."</td></tr>";
echo "</table>";

echo "<br><br>";

//echo "Childcare Amount = ".$ChildcareAmount."<br>";
//echo "Total Income =".$TotalIncome."<br>first_adult_deduct = ".$first_adult_deduct."<br>second_adult_deduct = ".$second_adult_deduct."<br>deduct_childsupport_amount = ".$deduct_childsupport_amount."<br>deduct_incomeexpenses_amount = ".$deduct_incomeexpenses_amount."<br>childcare_max_deduction = ".$childcare_max_deduction."<br>child_support_received_amount = ".$child_support_received_amount."<br>child_support_deduct_amount = ".$child_support_deduct_amount."<br>medical_elderly_disabled_amount = ".$medical_elderly_disabled_amount."<br>earned_income_disregard_amount = ".$earned_income_disregard_amount."<br>";
