<style>
.rem_section{
    /* background-color: rgba(194, 194, 194, .3); */
    background-color: var(--primary);
    position: absolute;
    bottom: 0;
    right: 10px;
    width: 500px;
    height: fit-content;
    z-index: 9;
    border: 1px solid var(--secondary);
    flex-direction: column;
    border-radius: 4px 4px 0 0;
    overflow: hidden;
    display: flex;
}
.div_rem{
    flex-direction: column;
    display: flex;

}
.div_rem > span{
    display: flex;
    padding: 5px;
    border-bottom: 1px solid var(--secondary);
justify-content: space-between;
background-color: var(--tertiary);
}
.div_rem > span > h2{
    color: var(--primary);
    display: flex;
    align-items: center;
    font-size: .85em;
    margin: 0;
}
.div_rem > span > h2 > i{
    margin: 4px;
    font-size: .95em;
}
.div_rem > span >i{
    padding: 0px 7px;
    cursor: pointer;
    color: var(--primary);
    display: flex;
    align-items: center;
}
.rem_drawer{
    overflow: auto;
    max-height: 320px;
    padding-bottom: 10px;
}
.hidRem{
    display: none;
}
.rem_bubble{    
    padding: 12px 15px;
    align-items: center;
    display: flex;
    border-radius: 10px;
    overflow: hidden;
    border-bottom: 1px dashed var(--secondary);
}
.rem_bubble > i{
    color: var(--red);    
    margin-right: 15px;
}
.rem_bubble > p{
    margin: 0;
    font-size: .9em;
}
.rem_bubble > p > strong{
    font-size: 1em;
}
</style>
<section class="rem_section">
<div class="div_rem" >
    <span  onclick="closeRem()"><h2><i class="fas fa-info-circle"></i>Remarks</h2></span>
    <div class="rem_drawer">    

    <?php 
    $arrVal = array(
        array($fname, "First Name"),
        array($mname,"Middle Name"),
        array($lname,"Last Name"),
        array($contact_,"Contact Number"),
        array($email, "Email Address"),
        array($ip_address,"IP"),
        array($mac_address,"MAC"),
        array($mun,"Municipal/City"),
        array($brgy_,"Barangay"),
        array($address,"Address"),
        array($subs_type,"Subscriber"),
        array($install_type,"Installation"),
        array($plan,"Plan/Bundle"),
        array($lineman,"Lineman"),
        array($serial,"Serial"),
        array($onu_model,"Onu Model"),
        array($nap,"NAP"),
        array($slot,"Slot"),
        array($layer,"Layer"),
        array($lcp,"LCP"),
        array($olt,"OLT"),
        array($gpon,"GPON"),
        array($wr_type,"Wire Type"),
        array($wr_start,"Wire Start"),
        array($wr_end,"Wire End"),
        array($box,"Box #"),
        array($card,"Card #")
    );
    $arr = array();
    foreach($arrVal as $item){
        if($item[0] == '' || $item[0] == 0){
            if($item[0] == 'netonly' || $item[0] == 'fbr_netonly' ){
                if($item[1] != "Box #" && $item[1] != "Card #"){
                    array_push($arr, $item[1]);
                }
            }else{
                array_push($arr, $item[1]);
            }
        }
    }
    // if($brgy_ == ''){
    //     array_push($arr, "Barangay");
    // }

    foreach ($arr as $item){
        echo'
            <div class="rem_bubble">
                <i class="fas fa-times"></i>
                <p>Field <strong>'.$item.'</strong> has an invalid value.</p>
        </div>';
    }
    ?>
            <!-- <i class="far fa-circle"></i> -->

        </div>
    </div>
</section>
<script>
    function closeRem(){
        if($(".rem_drawer").hasClass('hidRem')){
            $(".rem_drawer").removeClass('hidRem');
        }else{
            $(".rem_drawer").addClass('hidRem');
        }
    }
</script>