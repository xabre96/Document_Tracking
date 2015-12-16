$(document).ready(function (){
    $("#deduction, #bonus").keyup(function (){
        var deduction, bonus, gross, allowance, sum;
      
        deduction = parseFloat($("#deduction").val());
        bonus = parseFloat($("#bonus").val());
        gross = parseFloat($("#gross").val());
        allowance = parseFloat($("#allowance").val());
        lateDeduction = parseFloat($("#lateDeduction").val());
        
        sum = parseFloat(((gross + allowance) -  (deduction + lateDeduction)) + bonus).toFixed(2);
        
        if (isNaN(sum) == true){
            var number;
            
            if ((isNaN(deduction) == true) && (isNaN(bonus) == true)){
                number = (gross + allowance) - lateDeduction;
            }else {
                if (isNaN(deduction) == true){
                    number = (bonus + gross + allowance) - lateDeduction;
                }else {
                    number = (gross + allowance) - (deduction + lateDeduction);
                }
            }
            
            $("#pay").val(number.toFixed(2));
        }else {
            $("#pay").val(sum);
        }
    });
});