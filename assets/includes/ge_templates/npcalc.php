
    <style type="text/css">
        body
        {
            font-family:Arial;
            font-size:13px;
        }
        input 
        {
            font-family:Arial;
            font-size:13px;
        }
        
        .formtable td 
        {
            padding-bottom:15px;
        }
        
        .disclaimer 
        {
            margin-top:0px;
            margin-right:8px;
            margin-bottom: 20px;
            /*width:220px;*/
            width:480px;
            font-family:Arial;
            font-weight:normal;
            font-size:11px;
            text-align:left;
        }        
        .summarytable td
        {
            border-bottom:solid 1px #c7ddea;        
            padding: 6px 1px 7px 4px;
        }
        .boldtd {
            font-weight:bold;
            font-family: Arial;
            font-size:12px;
            color:#336699;
            width:150px;
        }
        .title1
        {
            color:#336699;
            font-family:Arial;
            font-size:12px;
            font-weight:bold;
        }
        .title2
        {
            color:#333333;
            font-family:Arial;
            font-size:13px;
            font-weight:bold;
        }
        
    </style>
    
    <script type="text/javascript">

        var dict = {};
        dict.isDependent;
        dict.financialAid = { 'active':false,  'title':'Financial aid', '0':'Yes', '1': 'No', 'intValue':0, 'textValue': '' };
        dict.age = { 'active': false, 'title': 'Age', 'intValue': 0 };
        dict.livingStatus = { 'active': false, 'title': 'Living arrangement', 'intValue': 0, 'textValue': '' };
        dict.residencyStatus = { 'active': false, 'title': 'Residency', 'intValue': 0, 'textValue': '' };
        dict.maritalStatus = { 'active': false, 'title': 'Marital Status', '0': 'No', '1': 'Yes', 'intValue': '' };
        dict.numberOfChildren = { 'active': false, 'title': 'Children', '0': 'No', '1': 'Yes', 'intValue': '' };
        dict.numberInFamily = { 'active': false, 'title': 'Number in Family', 'intValue': 0, 'textValue': '' };
        dict.numberInCollege = { 'active': false, 'title': 'Number in College', 'intValue': 0, 'textValue': '' };
        dict.householdIncome = { 'active': false, 'title': 'Household Income', 'intValue' : 0,
            '0': 'Less than $30,000',
            '1': 'Between $30,000 - $39,999',
            '2': 'Between $40,000 - $49,999',
            '3': 'Between $50,000 - $59,999',
            '4': 'Between $60,000 - $69,999',
            '5': 'Between $70,000 - $79,999',
            '6': 'Between $80,000 - $89,999',
            '7': 'Between $90,000 - $99,999',
            '8': 'Above $99,999'
        };

        var numberoflivingstatus = 0;
        var npc1_livingstatus = "";
        var npc1_isdefaultlivingstatus = "0";
        var npc1_residencystatus = "";
        var npc1_isdefaultresidencystatus = "0";
        var npc_step = "0";
        var currentstepid = "0";      
      
        
        

var efcDependent = []; 
efcDependent[0] = {};
efcDependent[0].numberInCollege=1;
efcDependent[0].numberInFamily=2;
efcDependent[0].incomeRanges= []; 
efcDependent[0].incomeRanges[0] = 0;  efcDependent[0].incomeRanges[1] = 1686;  efcDependent[0].incomeRanges[2] = 3511;  efcDependent[0].incomeRanges[3] = 5692;  efcDependent[0].incomeRanges[4] = 8403.5;  efcDependent[0].incomeRanges[5] = 11761;  efcDependent[0].incomeRanges[6] = 15124.5;  efcDependent[0].incomeRanges[7] = 18474;  efcDependent[0].incomeRanges[8] = 31008;  
efcDependent[1] = {};
efcDependent[1].numberInCollege=1;
efcDependent[1].numberInFamily=3;
efcDependent[1].incomeRanges= []; 
efcDependent[1].incomeRanges[0] = 0;  efcDependent[1].incomeRanges[1] = 1115;  efcDependent[1].incomeRanges[2] = 3019;  efcDependent[1].incomeRanges[3] = 5174;  efcDependent[1].incomeRanges[4] = 7685;  efcDependent[1].incomeRanges[5] = 10940;  efcDependent[1].incomeRanges[6] = 14466.5;  efcDependent[1].incomeRanges[7] = 18002;  efcDependent[1].incomeRanges[8] = 33701;  
efcDependent[2] = {};
efcDependent[2].numberInCollege=1;
efcDependent[2].numberInFamily=4;
efcDependent[2].incomeRanges= []; 
efcDependent[2].incomeRanges[0] = 0;  efcDependent[2].incomeRanges[1] = 234;  efcDependent[2].incomeRanges[2] = 2158;  efcDependent[2].incomeRanges[3] = 4102;  efcDependent[2].incomeRanges[4] = 6354;  efcDependent[2].incomeRanges[5] = 9257;  efcDependent[2].incomeRanges[6] = 12755;  efcDependent[2].incomeRanges[7] = 16325;  efcDependent[2].incomeRanges[8] = 33104;  
efcDependent[3] = {};
efcDependent[3].numberInCollege=1;
efcDependent[3].numberInFamily=5;
efcDependent[3].incomeRanges= []; 
efcDependent[3].incomeRanges[0] = 0;  efcDependent[3].incomeRanges[1] = 0;  efcDependent[3].incomeRanges[2] = 1238;  efcDependent[3].incomeRanges[3] = 3160;  efcDependent[3].incomeRanges[4] = 5266;  efcDependent[3].incomeRanges[5] = 7731;  efcDependent[3].incomeRanges[6] = 11132;  efcDependent[3].incomeRanges[7] = 14692;  efcDependent[3].incomeRanges[8] = 31461;  
efcDependent[4] = {};
efcDependent[4].numberInCollege=1;
efcDependent[4].numberInFamily=6;
efcDependent[4].incomeRanges= []; 
efcDependent[4].incomeRanges[0] = 0;  efcDependent[4].incomeRanges[1] = 0;  efcDependent[4].incomeRanges[2] = 0;  efcDependent[4].incomeRanges[3] = 1716;  efcDependent[4].incomeRanges[4] = 3635;  efcDependent[4].incomeRanges[5] = 5917;  efcDependent[4].incomeRanges[6] = 8708.5;  efcDependent[4].incomeRanges[7] = 12337;  efcDependent[4].incomeRanges[8] = 27970;  
efcDependent[5] = {};
efcDependent[5].numberInCollege=2;
efcDependent[5].numberInFamily=2;
efcDependent[5].incomeRanges= []; 
efcDependent[5].incomeRanges[0] = 0;  efcDependent[5].incomeRanges[1] = 1267;  efcDependent[5].incomeRanges[2] = 2144;  efcDependent[5].incomeRanges[3] = 3505;  efcDependent[5].incomeRanges[4] = 4262;  efcDependent[5].incomeRanges[5] = 4704;  efcDependent[5].incomeRanges[6] = 7526;  efcDependent[5].incomeRanges[7] = 0;  efcDependent[5].incomeRanges[8] = 11773;  
efcDependent[6] = {};
efcDependent[6].numberInCollege=2;
efcDependent[6].numberInFamily=3;
efcDependent[6].incomeRanges= []; 
efcDependent[6].incomeRanges[0] = 0;  efcDependent[6].incomeRanges[1] = 819;  efcDependent[6].incomeRanges[2] = 1822;  efcDependent[6].incomeRanges[3] = 3000;  efcDependent[6].incomeRanges[4] = 4600.5;  efcDependent[6].incomeRanges[5] = 6278;  efcDependent[6].incomeRanges[6] = 7971;  efcDependent[6].incomeRanges[7] = 9627;  efcDependent[6].incomeRanges[8] = 16663;  
efcDependent[7] = {};
efcDependent[7].numberInCollege=2;
efcDependent[7].numberInFamily=4;
efcDependent[7].incomeRanges= []; 
efcDependent[7].incomeRanges[0] = 0;  efcDependent[7].incomeRanges[1] = 467;  efcDependent[7].incomeRanges[2] = 1491;  efcDependent[7].incomeRanges[3] = 2587;  efcDependent[7].incomeRanges[4] = 3936;  efcDependent[7].incomeRanges[5] = 5657;  efcDependent[7].incomeRanges[6] = 7338;  efcDependent[7].incomeRanges[7] = 9119;  efcDependent[7].incomeRanges[8] = 18425;  
efcDependent[8] = {};
efcDependent[8].numberInCollege=2;
efcDependent[8].numberInFamily=5;
efcDependent[8].incomeRanges= []; 
efcDependent[8].incomeRanges[0] = 0;  efcDependent[8].incomeRanges[1] = 40;  efcDependent[8].incomeRanges[2] = 1006;  efcDependent[8].incomeRanges[3] = 2042;  efcDependent[8].incomeRanges[4] = 3216;  efcDependent[8].incomeRanges[5] = 4875;  efcDependent[8].incomeRanges[6] = 6505;  efcDependent[8].incomeRanges[7] = 8273;  efcDependent[8].incomeRanges[8] = 17738;  
efcDependent[9] = {};
efcDependent[9].numberInCollege=2;
efcDependent[9].numberInFamily=6;
efcDependent[9].incomeRanges= []; 
efcDependent[9].incomeRanges[0] = 0;  efcDependent[9].incomeRanges[1] = 0;  efcDependent[9].incomeRanges[2] = 189;  efcDependent[9].incomeRanges[3] = 1272.5;  efcDependent[9].incomeRanges[4] = 2308;  efcDependent[9].incomeRanges[5] = 3620;  efcDependent[9].incomeRanges[6] = 5417;  efcDependent[9].incomeRanges[7] = 7069;  efcDependent[9].incomeRanges[8] = 15897;  
efcDependent[10] = {};
efcDependent[10].numberInCollege=3;
efcDependent[10].numberInFamily=3;
efcDependent[10].incomeRanges= []; 
efcDependent[10].incomeRanges[0] = 0;  efcDependent[10].incomeRanges[1] = 994;  efcDependent[10].incomeRanges[2] = 1439;  efcDependent[10].incomeRanges[3] = 2577;  efcDependent[10].incomeRanges[4] = 3359;  efcDependent[10].incomeRanges[5] = 4448;  efcDependent[10].incomeRanges[6] = 5298;  efcDependent[10].incomeRanges[7] = 0;  efcDependent[10].incomeRanges[8] = 12459;  
efcDependent[11] = {};
efcDependent[11].numberInCollege=3;
efcDependent[11].numberInFamily=4;
efcDependent[11].incomeRanges= []; 
efcDependent[11].incomeRanges[0] = 0;  efcDependent[11].incomeRanges[1] = 401;  efcDependent[11].incomeRanges[2] = 1116;  efcDependent[11].incomeRanges[3] = 1914;  efcDependent[11].incomeRanges[4] = 2944;  efcDependent[11].incomeRanges[5] = 4121;  efcDependent[11].incomeRanges[6] = 5410;  efcDependent[11].incomeRanges[7] = 6421;  efcDependent[11].incomeRanges[8] = 11213;  
efcDependent[12] = {};
efcDependent[12].numberInCollege=3;
efcDependent[12].numberInFamily=5;
efcDependent[12].incomeRanges= []; 
efcDependent[12].incomeRanges[0] = 0;  efcDependent[12].incomeRanges[1] = 208;  efcDependent[12].incomeRanges[2] = 902;  efcDependent[12].incomeRanges[3] = 1634;  efcDependent[12].incomeRanges[4] = 2531;  efcDependent[12].incomeRanges[5] = 3705;  efcDependent[12].incomeRanges[6] = 5022;  efcDependent[12].incomeRanges[7] = 6108;  efcDependent[12].incomeRanges[8] = 12655;  
efcDependent[13] = {};
efcDependent[13].numberInCollege=3;
efcDependent[13].numberInFamily=6;
efcDependent[13].incomeRanges= []; 
efcDependent[13].incomeRanges[0] = 0;  efcDependent[13].incomeRanges[1] = 0;  efcDependent[13].incomeRanges[2] = 322.5;  efcDependent[13].incomeRanges[3] = 1012;  efcDependent[13].incomeRanges[4] = 1756;  efcDependent[13].incomeRanges[5] = 2677;  efcDependent[13].incomeRanges[6] = 3844;  efcDependent[13].incomeRanges[7] = 5133;  efcDependent[13].incomeRanges[8] = 10955;  

var efcIndWithoutDep = []; 
efcIndWithoutDep[0] = {};
efcIndWithoutDep[0].numberInCollege=1;
efcIndWithoutDep[0].numberInFamily=1;
efcIndWithoutDep[0].incomeRanges= []; 
efcIndWithoutDep[0].incomeRanges[0] = 0;  efcIndWithoutDep[0].incomeRanges[1] = 9365;  efcIndWithoutDep[0].incomeRanges[2] = 13167;  efcIndWithoutDep[0].incomeRanges[3] = 16943;  efcIndWithoutDep[0].incomeRanges[4] = 20691;  efcIndWithoutDep[0].incomeRanges[5] = 24364.5;  efcIndWithoutDep[0].incomeRanges[6] = 28107;  efcIndWithoutDep[0].incomeRanges[7] = 32163;  efcIndWithoutDep[0].incomeRanges[8] = 48043;  
efcIndWithoutDep[1] = {};
efcIndWithoutDep[1].numberInCollege=1;
efcIndWithoutDep[1].numberInFamily=2;
efcIndWithoutDep[1].incomeRanges= []; 
efcIndWithoutDep[1].incomeRanges[0] = 0;  efcIndWithoutDep[1].incomeRanges[1] = 6520.5;  efcIndWithoutDep[1].incomeRanges[2] = 10179;  efcIndWithoutDep[1].incomeRanges[3] = 14009;  efcIndWithoutDep[1].incomeRanges[4] = 17745;  efcIndWithoutDep[1].incomeRanges[5] = 21546;  efcIndWithoutDep[1].incomeRanges[6] = 25378;  efcIndWithoutDep[1].incomeRanges[7] = 29073;  efcIndWithoutDep[1].incomeRanges[8] = 41775.5;  
efcIndWithoutDep[2] = {};
efcIndWithoutDep[2].numberInCollege=2;
efcIndWithoutDep[2].numberInFamily=2;
efcIndWithoutDep[2].incomeRanges= []; 
efcIndWithoutDep[2].incomeRanges[0] = 601;  efcIndWithoutDep[2].incomeRanges[1] = 4624;  efcIndWithoutDep[2].incomeRanges[2] = 6456.5;  efcIndWithoutDep[2].incomeRanges[3] = 8399;  efcIndWithoutDep[2].incomeRanges[4] = 10286;  efcIndWithoutDep[2].incomeRanges[5] = 12183;  efcIndWithoutDep[2].incomeRanges[6] = 14102;  efcIndWithoutDep[2].incomeRanges[7] = 15930;  efcIndWithoutDep[2].incomeRanges[8] = 21563;  

var efcIndWithDep = []; 
efcIndWithDep[0] = {};
efcIndWithDep[0].numberInCollege=1;
efcIndWithDep[0].numberInFamily=2;
efcIndWithDep[0].incomeRanges= []; 
efcIndWithDep[0].incomeRanges[0] = 0;  efcIndWithDep[0].incomeRanges[1] = 356;  efcIndWithDep[0].incomeRanges[2] = 2072;  efcIndWithDep[0].incomeRanges[3] = 3818;  efcIndWithDep[0].incomeRanges[4] = 6068;  efcIndWithDep[0].incomeRanges[5] = 8965;  efcIndWithDep[0].incomeRanges[6] = 12222;  efcIndWithDep[0].incomeRanges[7] = 15595;  efcIndWithDep[0].incomeRanges[8] = 27614;  
efcIndWithDep[1] = {};
efcIndWithDep[1].numberInCollege=1;
efcIndWithDep[1].numberInFamily=3;
efcIndWithDep[1].incomeRanges= []; 
efcIndWithDep[1].incomeRanges[0] = 0;  efcIndWithDep[1].incomeRanges[1] = 0;  efcIndWithDep[1].incomeRanges[2] = 1264;  efcIndWithDep[1].incomeRanges[3] = 2968;  efcIndWithDep[1].incomeRanges[4] = 4941;  efcIndWithDep[1].incomeRanges[5] = 7522;  efcIndWithDep[1].incomeRanges[6] = 10951;  efcIndWithDep[1].incomeRanges[7] = 14402;  efcIndWithDep[1].incomeRanges[8] = 23856;  
efcIndWithDep[2] = {};
efcIndWithDep[2].numberInCollege=1;
efcIndWithDep[2].numberInFamily=4;
efcIndWithDep[2].incomeRanges= []; 
efcIndWithDep[2].incomeRanges[0] = 0;  efcIndWithDep[2].incomeRanges[1] = 0;  efcIndWithDep[2].incomeRanges[2] = 49;  efcIndWithDep[2].incomeRanges[3] = 1817;  efcIndWithDep[2].incomeRanges[4] = 3519;  efcIndWithDep[2].incomeRanges[5] = 5678;  efcIndWithDep[2].incomeRanges[6] = 8552;  efcIndWithDep[2].incomeRanges[7] = 12077;  efcIndWithDep[2].incomeRanges[8] = 21338;  
efcIndWithDep[3] = {};
efcIndWithDep[3].numberInCollege=1;
efcIndWithDep[3].numberInFamily=5;
efcIndWithDep[3].incomeRanges= []; 
efcIndWithDep[3].incomeRanges[0] = 0;  efcIndWithDep[3].incomeRanges[1] = 0;  efcIndWithDep[3].incomeRanges[2] = 0;  efcIndWithDep[3].incomeRanges[3] = 563;  efcIndWithDep[3].incomeRanges[4] = 2302;  efcIndWithDep[3].incomeRanges[5] = 4107;  efcIndWithDep[3].incomeRanges[6] = 6451;  efcIndWithDep[3].incomeRanges[7] = 9633;  efcIndWithDep[3].incomeRanges[8] = 19006;  
efcIndWithDep[4] = {};
efcIndWithDep[4].numberInCollege=1;
efcIndWithDep[4].numberInFamily=6;
efcIndWithDep[4].incomeRanges= []; 
efcIndWithDep[4].incomeRanges[0] = 0;  efcIndWithDep[4].incomeRanges[1] = 0;  efcIndWithDep[4].incomeRanges[2] = 0;  efcIndWithDep[4].incomeRanges[3] = 0;  efcIndWithDep[4].incomeRanges[4] = 526;  efcIndWithDep[4].incomeRanges[5] = 2248;  efcIndWithDep[4].incomeRanges[6] = 4086.5;  efcIndWithDep[4].incomeRanges[7] = 6497.5;  efcIndWithDep[4].incomeRanges[8] = 15341.5;  
efcIndWithDep[5] = {};
efcIndWithDep[5].numberInCollege=2;
efcIndWithDep[5].numberInFamily=2;
efcIndWithDep[5].incomeRanges= []; 
efcIndWithDep[5].incomeRanges[0] = 0;  efcIndWithDep[5].incomeRanges[1] = 628;  efcIndWithDep[5].incomeRanges[2] = 1470;  efcIndWithDep[5].incomeRanges[3] = 2434;  efcIndWithDep[5].incomeRanges[4] = 3774;  efcIndWithDep[5].incomeRanges[5] = 5363.5;  efcIndWithDep[5].incomeRanges[6] = 6977;  efcIndWithDep[5].incomeRanges[7] = 8651;  efcIndWithDep[5].incomeRanges[8] = 13859;  
efcIndWithDep[6] = {};
efcIndWithDep[6].numberInCollege=2;
efcIndWithDep[6].numberInFamily=3;
efcIndWithDep[6].incomeRanges= []; 
efcIndWithDep[6].incomeRanges[0] = 0;  efcIndWithDep[6].incomeRanges[1] = 246;  efcIndWithDep[6].incomeRanges[2] = 1084;  efcIndWithDep[6].incomeRanges[3] = 1961;  efcIndWithDep[6].incomeRanges[4] = 3086;  efcIndWithDep[6].incomeRanges[5] = 4675;  efcIndWithDep[6].incomeRanges[6] = 6386.5;  efcIndWithDep[6].incomeRanges[7] = 8073;  efcIndWithDep[6].incomeRanges[8] = 12842;  
efcIndWithDep[7] = {};
efcIndWithDep[7].numberInCollege=2;
efcIndWithDep[7].numberInFamily=4;
efcIndWithDep[7].incomeRanges= []; 
efcIndWithDep[7].incomeRanges[0] = 0;  efcIndWithDep[7].incomeRanges[1] = 0;  efcIndWithDep[7].incomeRanges[2] = 496;  efcIndWithDep[7].incomeRanges[3] = 1306;  efcIndWithDep[7].incomeRanges[4] = 2217;  efcIndWithDep[7].incomeRanges[5] = 3408;  efcIndWithDep[7].incomeRanges[6] = 4998;  efcIndWithDep[7].incomeRanges[7] = 6644;  efcIndWithDep[7].incomeRanges[8] = 10974;  
efcIndWithDep[8] = {};
efcIndWithDep[8].numberInCollege=2;
efcIndWithDep[8].numberInFamily=5;
efcIndWithDep[8].incomeRanges= []; 
efcIndWithDep[8].incomeRanges[0] = 0;  efcIndWithDep[8].incomeRanges[1] = 0;  efcIndWithDep[8].incomeRanges[2] = 0;  efcIndWithDep[8].incomeRanges[3] = 730;  efcIndWithDep[8].incomeRanges[4] = 1516;  efcIndWithDep[8].incomeRanges[5] = 2473.5;  efcIndWithDep[8].incomeRanges[6] = 3750;  efcIndWithDep[8].incomeRanges[7] = 5343;  efcIndWithDep[8].incomeRanges[8] = 9450;  
efcIndWithDep[9] = {};
efcIndWithDep[9].numberInCollege=2;
efcIndWithDep[9].numberInFamily=6;
efcIndWithDep[9].incomeRanges= []; 
efcIndWithDep[9].incomeRanges[0] = 0;  efcIndWithDep[9].incomeRanges[1] = 0;  efcIndWithDep[9].incomeRanges[2] = 0;  efcIndWithDep[9].incomeRanges[3] = 0;  efcIndWithDep[9].incomeRanges[4] = 654;  efcIndWithDep[9].incomeRanges[5] = 1406.5;  efcIndWithDep[9].incomeRanges[6] = 2314;  efcIndWithDep[9].incomeRanges[7] = 3474.5;  efcIndWithDep[9].incomeRanges[8] = 7457;  
        
        // POA
        var POA_Total = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var POA_TRF = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var POA_BS = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var POA_RB = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];        
        var POA_O = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        
             
        // TGA
        var TGA_0 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_1_1000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_1001_2500 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_2501_5000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_5001_7500 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_7501_10000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_10001_12500 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_12501_15000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_15001_20000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_20001_30000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_30001_40000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_40000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_NFAFSA = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        POA_Total = ['24434','21919'];
POA_TRF = ['13769','13769'];
POA_BS = ['1500','1500'];
POA_RB = ['2515','0'];
POA_O = ['6650','6650'];
TGA_0 = ['8078','8078'];
TGA_1_1000 = ['8078','8078'];
TGA_1001_2500 = ['8078','8078'];
TGA_2501_5000 = ['8078','8078'];
TGA_5001_7500 = ['8078','8078'];
TGA_7501_10000 = ['8078','8078'];
TGA_10001_12500 = ['8078','8078'];
TGA_12501_15000 = ['8078','8078'];
TGA_15001_20000 = ['8078','8078'];
TGA_20001_30000 = ['8078','8078'];
TGA_30001_40000 = ['7407','7407'];
TGA_40000 = ['7407','7407'];
TGA_NFAFSA = ['0','0'];





        // Step id Defenition
        // 1 Age, Living Status, Residency Status
        // 2 Marital Status, Number of Children
        // 3 Dependent
        // 4 Independent
        // 5 Summary page
        // 6 OUTPUT PAGE        
        function GoNext() {
            var imgJavaScriptNote = document.getElementById('imgJavaScriptNote');
            if(imgJavaScriptNote) {
                imgJavaScriptNote.style.display = 'none';
            }

            // Variable that tells us if we need to dispaly only 2 radio buttons for "Dependent: Number of Family"
            var showOnly2RbForNumberInFamily = false;

            if (currentstepid) {
                if (currentstepid == "0") {                    
                    GoTo("1");
                    return;
                } else if (currentstepid == "1") {
                    var tmp_financialAid = GetRadioButtonValues("rb_financialaid").value; // Financial Aid                    
                    var tmp_age = GetTextBoxValue("txt_age"); // Age
                    // Living Status
                    if (npc1_livingstatus != "-1") {
                        if (npc1_isdefaultlivingstatus == "0") {
                            npc1_livingstatus = GetRadioButtonValues("rb_livingstatus").value;
                        }
                    }
                    // Residency Status
                    if (npc1_residencystatus != "-1") {
                        if (npc1_isdefaultresidencystatus == "0") {
                            npc1_residencystatus = GetRadioButtonValues("rb_residencystatus").value;
                        }
                    }
                    // Validate
                    if (tmp_financialAid == "" || tmp_age == "" || npc1_livingstatus == "" || npc1_residencystatus == "") {
                        alert("Please answer all questions before proceeding.");
                        return;
                    }
                    if (!IsInteger(tmp_age)) {
                        alert("Please enter integers only.");
                        return;
                    }
                    
                    // Save entered values into dictionary
                    dict['financialAid'].active = true;
                    dict['financialAid'].intValue = tmp_financialAid;
                    dict['age'].active = true;
                    dict['age'].intValue = tmp_age;                    
                    if (npc1_livingstatus != "-1") {
                        if (npc1_isdefaultlivingstatus == "0") {
                            dict['livingStatus'].active = true;
                            dict['livingStatus']['textValue'] = GetRadioButtonValues("rb_livingstatus").label.getAttribute('title');
                            
                        }
                    }
                    if (npc1_residencystatus != "-1") {
                        if (npc1_isdefaultresidencystatus == "0") {
                            dict['residencyStatus'].active = true;
                            dict['residencyStatus']['textValue'] = GetRadioButtonValues("rb_residencystatus").label.getAttribute('title');
                        }
                    }
                    
                    // Rules
                    if (dict['financialAid'].intValue == "1") {
                        GenerateSummary();
                        GoTo("5"); 
                    } 
                    else {
                        // Hide/show marital status depending on age
                        if (dict['age'].intValue*1 > 23) {
                            var tbl = document.getElementById('tblMaritalStatusQuestion');
                            if (tbl) { tbl.style.display = 'none'; }
                        } else {
                            var tbl = document.getElementById('tblMaritalStatusQuestion');
                            if (tbl) { tbl.style.display = ''; }
                        }
                        GoTo("2"); // Change: was 4
                    }
                    return;
                } else if (currentstepid == "2") {
                    // Marital Status
                    var tmp_maritalStatus;
                    if (dict['age'].intValue*1 < 24) {
                        tmp_maritalStatus = GetRadioButtonValues("rb_maritalstatus").value;                       
                        dict['maritalStatus'].active = true;
                    }
                    else { dict['maritalStatus'].active = false; }
                    
                    // Number of Children
                    var tmp_numberOfChildren = GetRadioButtonValues("rb_numberofchildren").value;

                    // Validate
                    var showError = false;
                    if (dict['age'].intValue * 1 < 24 && tmp_maritalStatus == "") {
                        showError = true;
                    }
                    if (tmp_numberOfChildren == "") {
                        showError = true;                        
                    }
                    if (showError == true) {
                        alert("Please answer all questions before proceeding.");
                        return;
                    }
                    // Save entered values into dictionary
                    dict['maritalStatus'].intValue = tmp_maritalStatus;
                    dict['numberOfChildren'].active = true;
                    dict['numberOfChildren'].intValue = tmp_numberOfChildren;


                    // For independent with children, display additional radio buttons with 'Number in Family'
                    var divNumInFamilyRadiobuttons = document.getElementById('divNumInFamilyWithChildren');

                    // For independent there are 2 different hints: with children and without
                    var spanNumInFamilyHint = document.getElementById('spanNumInFamilyHint');
                    if (spanNumInFamilyHint)
                        spanNumInFamilyHint.style.display = 'none';
                    var spanNumInFamilyHintWithChildren = document.getElementById('spanNumInFamilyHintWithChildren');
                    if (spanNumInFamilyHintWithChildren)
                        spanNumInFamilyHintWithChildren.style.display = 'none';

                    // For independent we have 2 different scenarios for number on college: 'Two' and 'Two or more'
                    var spanTwo = document.getElementById('spanIndNumInCollegeTwo');
                    var spanTwoOrMore = document.getElementById('spanIndNumInCollegeTwoOrMore');
                    var divFirstOptionForNumInFamilyWithChildren = document.getElementById('divFirstOptionForNumInFamilyWithChildren');

                    spanTwo.style.display = 'none';
                    spanTwoOrMore.style.display = 'none';
                    divFirstOptionForNumInFamilyWithChildren.style.display = '';
                    
                    

                    // Rules
                    if (dict['age'].intValue * 1 > 23) {
                         var divNumInFWithCh = document.getElementById('divNumInFamilyWithChildren');
                        if (dict['maritalStatus'].intValue * 1 > 0) {
                            // show options for student with children                            
                            if (divNumInFWithCh) { divNumInFWithCh.style.display = ''; }                            
                        }
                        else {
                            // hide options for student with children
                            if (divNumInFWithCh) { divNumInFWithCh.style.display = 'none'; }                            
                        }
                        dict.isDependent = false;
                        if (dict['numberOfChildren'].intValue * 1 == 1) {
                            if (spanTwo) { spanTwo.style.display = 'none'; }
                            if (spanTwoOrMore) { spanTwoOrMore.style.display = ''; }
                            if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = ''; }
                            if (spanNumInFamilyHintWithChildren) { spanNumInFamilyHintWithChildren.style.display = ''; }
                            if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = 'none'; }
                            // This flag tells us that for "Number in Family" we should display more than 2 radio buttons
                            showOnly2RbForNumberInFamily = false;

                            // If user selected before "Number in College: Two" and now we display "Two or More", we need to reset radio buttons
                            var rbTwoOrMore = GetRadioButtonValues("rb_indnumincollege").value.split('|');
                            if(rbTwoOrMore && rbTwoOrMore[0] == "Two")
                                ResetRadioButton('rb_indnumincollege');

                        } else {
                            if (spanTwo) { spanTwo.style.display = ''; }
                            if (spanTwoOrMore) { spanTwoOrMore.style.display = 'none'; }
                            if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = 'none'; }
                            if (spanNumInFamilyHint) { spanNumInFamilyHint.style.display = ''; }
                            if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = ''; }
                            // This flag tells us that for "Number in Family" we should display only 2 radio buttons
                            showOnly2RbForNumberInFamily = true;
                            
                            // If user selected before "Number in College: Two or More" and now we display "Two", we need to reset radio buttons
                            var rbTwoOrMore = GetRadioButtonValues("rb_indnumincollege").value.split('|');
                            if(rbTwoOrMore && rbTwoOrMore[0] == "Two or more")
                                ResetRadioButton('rb_indnumincollege');
                        }
                        if (showOnly2RbForNumberInFamily == true) {
                            var prevSelectedNumOfFamily = GetRadioButtonValues("rb_indnuminfamily").value.split('|');
                            if (prevSelectedNumOfFamily) {
                                if (prevSelectedNumOfFamily[1] > 2)
                                    ResetRadioButton('rb_indnuminfamily');
                            }
                        }
                        GoTo('4');

                    } else {
                        if (dict['numberOfChildren'].intValue * 1 > 0 || dict['maritalStatus'].intValue * 1 > 0) {                           
                            dict.isDependent = false;
                            if (dict['numberOfChildren'].intValue * 1 > 0)
                                showOnly2RbForNumberInFamily = false;                            
                            else
                                showOnly2RbForNumberInFamily = true;

                            if(showOnly2RbForNumberInFamily == true)
                            {
                                var prevSelectedNumOfFamily = GetRadioButtonValues("rb_indnuminfamily").value.split('|');
                                if (prevSelectedNumOfFamily) {
                                    if (prevSelectedNumOfFamily[1] > 2)
                                        ResetRadioButton('rb_indnuminfamily');
                                }
                            }

                            if (dict['numberOfChildren'].intValue * 1 == 1) {
                                if (spanTwo) { spanTwo.style.display = 'none'; }
                                if (spanTwoOrMore) { spanTwoOrMore.style.display = ''; }
                                if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = ''; }
                                if (spanNumInFamilyHintWithChildren) { spanNumInFamilyHintWithChildren.style.display = ''; }
                                if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = 'none'; }
                                // If user selected before "Number in College: Two" and now we display "Two or More", we need to reset radio buttons
                                var rbTwoOrMore = GetRadioButtonValues("rb_indnumincollege").value.split('|');
                                if(rbTwoOrMore && rbTwoOrMore[0] == "Two")
                                    ResetRadioButton('rb_indnumincollege');
                            } else {
                                if (spanTwo) { spanTwo.style.display = ''; }
                                if (spanTwoOrMore) { spanTwoOrMore.style.display = 'none'; }
                                if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = 'none'; }
                                if (spanNumInFamilyHint) { spanNumInFamilyHint.style.display = ''; }
                                if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = ''; }
                                // If user selected before "Number in College: Two or More" and now we display "Two", we need to reset radio buttons
                                var rbTwoOrMore = GetRadioButtonValues("rb_indnumincollege").value.split('|');
                                if(rbTwoOrMore && rbTwoOrMore[0] == "Two or more")
                                    ResetRadioButton('rb_indnumincollege');
                            }

                            GoTo("4");
                        } else {
                            dict.isDependent = true;
                            GoTo("3");  
                        }
                    }
                    return;
                } else if (currentstepid == "3") {                    
                    var arrNumInFamily = GetRadioButtonValues("rb_numinfamily_dep").value.split('|');
                    var arrNumInCollege = GetRadioButtonValues("rb_numincollege_dep").value.split('|');                                        
                    var tmp_numberinfamily = arrNumInFamily[0];
                    var tmp_numberincollege = arrNumInCollege[0];
                    var tmp_householdincome = GetRadioButtonValues("rb_householdincome_dep").value;
                    
                    // Validate
                    if (tmp_numberinfamily == "" || tmp_numberincollege == "" || tmp_householdincome == "") {
                        alert("Please answer all questions before proceeding.");
                        return;
                    }                   
                    if (arrNumInCollege[1] * 1 >= arrNumInFamily[1] * 1) {                        
                        alert('The Number in College must be less than the specified Number in Family.');
                        return;
                    }
                    
                    // Save entered values into dictionary
                    dict['numberInFamily'].active = true;
                    dict['numberInFamily'].textValue = tmp_numberinfamily;
                    dict['numberInFamily'].intValue = arrNumInFamily[1]*1;
                    dict['numberInCollege'].active = true;
                    dict['numberInCollege'].textValue = tmp_numberincollege;
                    dict['numberInCollege'].intValue = arrNumInCollege[1]*1;
                    dict['householdIncome'].active = true;
                    dict['householdIncome'].intValue = tmp_householdincome * 1;
                    GenerateSummary();
                    GoTo("5");
                    return;
                } else if (currentstepid == "4") {
                    var arrNumInFamily = GetRadioButtonValues("rb_indnuminfamily").value.split('|');
                    var arrNumInCollege = GetRadioButtonValues("rb_indnumincollege").value.split('|');
                    var tmp_numberinfamily = arrNumInFamily[0];
                    var tmp_numberincollege = arrNumInCollege[0];
                    var tmp_householdincome = GetRadioButtonValues("rb_householdincome_ind").value;

                    // Validate
                    if (tmp_numberinfamily == "" || tmp_numberincollege == "" || tmp_householdincome == "") {
                        alert("Please answer all questions before proceeding.");
                        return;
                    }
                    if (arrNumInCollege[1] * 1 > arrNumInFamily[1] * 1) {
                        alert('The Number in College must be less than or equal to the specified Number in Family.');
                        return;
                    }

                    // Save entered values into dictionary
                    dict['numberInFamily'].active = true;
                    dict['numberInFamily'].textValue = tmp_numberinfamily;
                    dict['numberInFamily'].intValue = arrNumInFamily[1]*1;
                    dict['numberInCollege'].active = true;
                    dict['numberInCollege'].textValue = tmp_numberincollege;
                    dict['numberInCollege'].intValue = arrNumInCollege[1]*1;
                    dict['householdIncome'].active = true;
                    dict['householdIncome'].intValue = tmp_householdincome * 1;
                    
                    GenerateSummary();
                    GoTo("5");
                    return;
                }
                else if(currentstepid == "5")
                {
                    GenerateReport();
                    GoTo("6");
                }
            }
        }
        
        function GoTo(stepid) {
            if (typeof stepid != 'undefined') {
                var divWithContent = document.getElementById('dv_npc_s' + stepid);
                var stepTitle = document.getElementById('dv_npc_s' + stepid + '_t');
                var stepnumber = document.getElementById("s_step" + stepid);
                var dv_npc_s6_r = document.getElementById("dv_npc_s"+stepid+"_r");
                
                if ((divWithContent && stepTitle && stepnumber) || (divWithContent && stepid=="0")) {
                    // Handle Step Number
                    if (stepid == "0") {                      // Going Back to Step #0  
                        openInstitutionNameWindow();
                        npc_step = "0";
                    }
                    else if (stepid * 1 > currentstepid) {    // next
                        npc_step = npc_step * 1 + 1;
                    } else {                                  // previous
                        npc_step = npc_step * 1 - 1;
                    }

                    // Write step number to span element
                    if (stepid != "0") {
                        stepnumber.innerHTML = npc_step;
                    }

                    // Show/Hide Step - Change Step
                    HideAllSteps();
                    divWithContent.style.display = "block";                    
                    if (stepid != "0") {
                        stepTitle.style.display = "block";
                    }
                    if (stepid == "6") {
                        dv_npc_s6_r.style.display = "block";
                        var s_step6_h1 = document.getElementById("s_step6_h1");
                        var s_step6_h2 = document.getElementById("s_step6_h2");
                        if (s_step6_h1 && s_step6_h2) {
                            if (npc1_financialaid * 1 == 0) {
                                s_step6_h1.style.display = "block";
                                s_step6_h2.style.display = "none";
                            } else {
                                s_step6_h1.style.display = "none";
                                s_step6_h2.style.display = "block";
                            }
                        }
                    }                    
                    currentstepid = stepid;
                }
            }
        }



        function GoPrevious() {            
            var imgJavaScriptNote = document.getElementById('imgJavaScriptNote');
            if(imgJavaScriptNote) {
                imgJavaScriptNote.style.display = 'none';
            }

            if(currentstepid == '1') {                
                if(imgJavaScriptNote) {
                    imgJavaScriptNote.style.display = '';
                }
            }
            
            if (currentstepid != '5' && currentstepid != '4') {
                GoTo('' + (currentstepid * 1 - 1));
            }
            else if (currentstepid == '4') {
                GoTo('2');
            }
            else {
                if (dict.isDependent == true)
                    GoTo('3');
                else
                    GoTo('4');
            }
        }


        function GenerateReport() {
            var efc = 0;
            if (dict['financialAid'].intValue * 1 == 0) {                
                efc = GetEFC();
            }
            var lookup_column = "-1";
            if (npc1_livingstatus == "-1") {
                lookup_column = npc1_livingstatus;
            } else {
                var res_status = 0;
                if (npc1_residencystatus != "-1") {
                    res_status = npc1_residencystatus;
                }
                lookup_column = numberoflivingstatus * 1 * res_status * 1 + npc1_livingstatus * 1;
            }
            
            if (lookup_column == "-1") {
                return;
            }
            
            var s_etpoa = document.getElementById("s_etpoa");
            var s_etf = document.getElementById("s_etf");
            var s_erb = document.getElementById("s_erb");
            var s_ebs = document.getElementById("s_ebs");
            var s_eo = document.getElementById("s_eo");
            var s_etga = document.getElementById("s_etga");
            var s_enp = document.getElementById("s_enp");
            var x = 0;
            var y = 0;
            
            if (s_etpoa) {
                x = POA_Total[lookup_column];
                s_etpoa.innerHTML = formatCurrency(x);
            }
            if (s_etf) {
                s_etf.innerHTML = formatCurrency(POA_TRF[lookup_column]);
            }
            if (s_erb) {
                s_erb.innerHTML = formatCurrency(POA_RB[lookup_column]);
            }
            if (s_ebs) {
                s_ebs.innerHTML = formatCurrency(POA_BS[lookup_column]);
            }
            if (s_eo) {
                s_eo.innerHTML = formatCurrency(POA_O[lookup_column]);
            }
            if (s_etga) {
                if (dict['financialAid'].intValue * 1 == 1) {
                    // NON-FAFSA
                    y = TGA_NFAFSA[lookup_column];
                }  else if (efc * 1 == 0) {
                    y = TGA_0[lookup_column];
                } else if (efc * 1 >= 1 && efc * 1 <= 1000) {
                    y = TGA_1_1000[lookup_column];
                } else if (efc * 1001 >= 1 && efc * 1 <= 2500) {
                    y = TGA_1001_2500[lookup_column];
                } else if (efc * 2501 >= 1 && efc * 1 <= 5000) {
                    y = TGA_2501_5000[lookup_column];
                } else if (efc * 1 >= 5001 && efc * 1 <= 7500) {
                    y = TGA_5001_7500[lookup_column];
                } else if (efc * 1 >= 7501 && efc * 1 <= 10000) {
                    y = TGA_7501_10000[lookup_column];
                } else if (efc * 1 >= 10001 && efc * 1 <= 12500) {
                    y = TGA_10001_12500[lookup_column];
                } else if (efc * 1 >= 12501 && efc * 1 <= 15000) {
                    y = TGA_12501_15000[lookup_column];
                } else if (efc * 1 >= 15001 && efc * 1 <= 20000) {
                    y = TGA_15001_20000[lookup_column];
                } else if (efc * 1 >= 20001 && efc * 1 <= 30000) {
                    y = TGA_20001_30000[lookup_column];
                } else if (efc * 1 >= 30001 && efc * 1 <= 40000) {
                    y = TGA_30001_40000[lookup_column];
                } else if (efc * 1 >= 40001) {
                    y = TGA_40000[lookup_column];
                }
                s_etga.innerHTML = formatCurrency(y);
            }
            if (s_enp) {
                var z = x * 1 - y * 1;
                s_enp.innerHTML = formatCurrency(z);
            }
            
        }


        function GetEFC() {
            var efc = 0;
            if(dict.isDependent == true) {
                var arrayLength = efcDependent.length;
                for(var i=0; i<arrayLength; i++) {
                    if(efcDependent[i].numberInCollege == dict['numberInCollege'].intValue && efcDependent[i].numberInFamily == dict['numberInFamily'].intValue) {
                        efc = efcDependent[i].incomeRanges[dict['householdIncome'].intValue];
                        break;
                    }
                }

            } else {                
                if(dict['numberOfChildren'].intValue == 0) {
                    // without children
                    var arrayLength = efcIndWithoutDep.length;
                    for(var i=0; i<arrayLength; i++) {
                        if(efcIndWithoutDep[i].numberInCollege == dict['numberInCollege'].intValue && efcIndWithoutDep[i].numberInFamily == dict['numberInFamily'].intValue) {
                            efc = efcIndWithoutDep[i].incomeRanges[dict['householdIncome'].intValue];
                            break;
                        }
                    }
                } else {
                    // with children
                    var arrayLength = efcIndWithDep.length;
                    for(var i=0; i<arrayLength; i++) {
                        if(efcIndWithDep[i].numberInCollege == dict['numberInCollege'].intValue && efcIndWithDep[i].numberInFamily == dict['numberInFamily'].intValue) {
                            efc = efcIndWithDep[i].incomeRanges[dict['householdIncome'].intValue];
                            break;
                        }
                    }
                }
            }
            return efc;
        }
        
        // Generate summary table with user's input
        function GenerateSummary() {               
            var html = '<table border=\'0\' cellpadding=\'2\' cellspacing=\'0\' style=\'width:100%;\'>';            
            // Step 1
            if (dict['financialAid'].active == true) {
                html = html + '<tr><td class=\'boldtd\'>' + dict['financialAid'].title + '</td><td>' + dict['financialAid'][dict['financialAid'].intValue] + '</td></tr>';
            }
            if(dict['age'].active == true) {
                html = html +'<tr><td class=\'boldtd\'>'+dict['age'].title+'</td><td>'+dict['age'].intValue+'</td></tr>';
            }
            if (dict['livingStatus'].active == true) {
                html = html + '<tr><td class=\'boldtd\'>' + dict['livingStatus'].title + '</td><td>' + dict['livingStatus'].textValue + '</td></tr>';
            }
            if (dict['residencyStatus'].active == true) {
                html = html + '<tr><td class=\'boldtd\'>' + dict['residencyStatus'].title + '</td><td>' + dict['residencyStatus'].textValue + '</td></tr>';
            }
            
            // Step 2
            if (dict['maritalStatus'].active == true) {
                html = html + '<tr><td class=\'boldtd\'>' + dict['maritalStatus'].title + '</td><td>' + dict['maritalStatus'][dict['maritalStatus'].intValue] + '</td></tr>';
            }
            if (dict['numberOfChildren'].active == true) {
                html = html + '<tr><td class=\'boldtd\'>' + dict['numberOfChildren'].title + '</td><td>' + dict['numberOfChildren'][dict['numberOfChildren'].intValue] + '</td></tr>';
            }
            
            // Step 3 & 4
            if (dict['numberInFamily'].active == true) {
                html = html + '<tr><td class=\'boldtd\'>' + dict['numberInFamily'].title + '</td><td>' + dict['numberInFamily'].textValue + '</td></tr>';
            }
            if (dict['numberInCollege'].active == true) {
                html = html + '<tr><td class=\'boldtd\'>' + dict['numberInCollege'].title + '</td><td>' + dict['numberInCollege'].textValue + '</td></tr>';
            }
            if (dict['householdIncome'].active == true) {
                html = html + '<tr><td class=\'boldtd\'>' + dict['householdIncome'].title + '</td><td>' + dict['householdIncome'][dict['householdIncome'].intValue] + '</td></tr>';
            }
            var dv_summary = document.getElementById('dv_summary');
            dv_summary.innerHTML = html +  '</table>';
        }

        // Function displays bunner of institution
        function setupBanner() {
            var imgInstitutionBanner = document.getElementById('imgInstitutionBanner');
            var divInstitutionBanner = document.getElementById('divInstitutionBanner');

            if(imgInstitutionBanner)
            {
                imgInstitutionBanner.src = '../../assets/includes/ge_templates/images/' + bannerFileName;
                if(divInstitutionBanner)                
                    divInstitutionBanner.style.display = '';                
            }
        }



        function HideAllSteps() {
            var dv_npc_s1_t = document.getElementById("dv_npc_s1_t");
            if(dv_npc_s1_t)
                dv_npc_s1_t.style.display = 'none';
            
            var dv_npc_s2_t = document.getElementById("dv_npc_s2_t");
            if(dv_npc_s2_t)
                dv_npc_s2_t.style.display = 'none';
            
            var dv_npc_s3_t = document.getElementById("dv_npc_s3_t");
            if(dv_npc_s3_t)
                dv_npc_s3_t.style.display = 'none';
            
            var dv_npc_s4_t = document.getElementById("dv_npc_s4_t");
            if(dv_npc_s4_t)
                dv_npc_s4_t.style.display = 'none';
            
            var dv_npc_s5_t = document.getElementById("dv_npc_s5_t");
            if(dv_npc_s5_t)
                dv_npc_s5_t.style.display = 'none';
            
            var dv_npc_s6_t = document.getElementById("dv_npc_s6_t");
            if(dv_npc_s6_t)
                dv_npc_s6_t.style.display = 'none';
            
            var dv_npc_s6_r = document.getElementById("dv_npc_s6_r");
            if(dv_npc_s6_r)
                dv_npc_s6_r.style.display = 'none';
            
            var dv_npc_s0 = document.getElementById("dv_npc_s0");
            if(dv_npc_s0)
                dv_npc_s0.style.display = 'none';
            
            var dv_npc_s1 = document.getElementById("dv_npc_s1");
            if(dv_npc_s1)
                dv_npc_s1.style.display = 'none';
            
            var dv_npc_s2 = document.getElementById("dv_npc_s2");
            if(dv_npc_s2)
                dv_npc_s2.style.display = 'none';
            
            var dv_npc_s3 = document.getElementById("dv_npc_s3");
            if(dv_npc_s3)
                dv_npc_s3.style.display = 'none';
            
            var dv_npc_s4 = document.getElementById("dv_npc_s4");
            if(dv_npc_s4)
                dv_npc_s4.style.display = 'none';
            
            var dv_npc_s5 = document.getElementById("dv_npc_s5");
            if(dv_npc_s5)
                dv_npc_s5.style.display = 'none';
            
            var dv_npc_s6 = document.getElementById("dv_npc_s6");
            if(dv_npc_s6)
                dv_npc_s6.style.display = 'none';
        }



        function ResetForm() {
            var imgJavaScriptNote = document.getElementById('imgJavaScriptNote');
            if(imgJavaScriptNote) {
                imgJavaScriptNote.style.display = '';
            }
            // 1
            ResetRadioButton("rb_financialaid");
            ResetTextBox("txt_age");
            ResetRadioButton("rb_livingstatus");
            ResetRadioButton("rb_residencystatus");
            // 2
            ResetRadioButton("rb_maritalstatus");
            ResetRadioButton("rb_numberofchildren");
            // 3
            ResetRadioButton("rb_numinfamily_dep");
            ResetRadioButton("rb_numincollege_dep");
            ResetRadioButton("rb_householdincome_dep");
            // 4
            ResetRadioButton("rb_indnuminfamily");
            ResetRadioButton("rb_indnumincollege");
            ResetRadioButton("rb_householdincome_ind");
            
            // 6
            ResetSpan("s_step6_body");
        }
        

        function StartOver() {
            ResetForm();
            ClearVars();
            GoTo("0");
        }
        
        // function executes when user clicks 'Modify' button        
        function ClearVars() {           
            npc_step = "0";
            currentstepid = "0";
            
            // set active=false to 'dict' variable
            for(propertyName in dict) {
                if(typeof(dict[propertyName]) !== 'function') {
                    dict[propertyName].active = false;
                    if (dict[propertyName].intValue)
                        dict[propertyName].intValue = 0;
                    if (dict[propertyName].textValue)
                        dict[propertyName].textValue = '';
                }
            }
            // setup initial constants
            SetupConstants();            
        }
       
        function ResetSpan(s) {
            if (s) {
                var sid = document.getElementById(s);
                if (sid) {
                    sid.innerHTML = "";
                }
            }
        }

        function ResetRadioButton(rb) {
            if (rb) {
                var n = document.getElementsByName(rb);
                if (n) {
                    for (var i = 0; i < n.length; i++) {
                        n[i].checked = false;
                    }
                }
            }
        }

        function ResetTextBox(t) {
            if (t) {
                var txt = document.getElementById(t);
                if (txt) {
                    txt.value = "";
                }
            }
        }

        function GetRadioButtonValues(rb) {
            if (rb) {
                var n = document.getElementsByName(rb);
                if (n) {
                    for (var i = 0; i < n.length; i++) {
                        if (n[i].checked) {
                            return {label:n[i],value:n[i].value};
                        }
                    }
                }
            }
            return {value:"",label:""};
        }

        function GetTextBoxValue(t) {
            if (t) {
                var txt = document.getElementById(t);
                if (txt) {
                    return txt.value;
                }
            }
        }       
        
        function IsInteger(sText)
        {
            var ValidChars = "0123456789";
            var IsNumber = true;
            var Char;

            for (i = 0; i < sText.length && IsNumber == true; i++) {
                Char = sText.charAt(i);
                if (ValidChars.indexOf(Char) == -1) {
                    IsNumber = false;
                }
            }
            return IsNumber;
        }

        function IsNumeric(sText) {
            var ValidChars = "0123456789.";
            var IsNumber = true;
            var Char;

            for (i = 0; i < sText.length && IsNumber == true; i++) {
                Char = sText.charAt(i);
                if (ValidChars.indexOf(Char) == -1) {
                    IsNumber = false;
                }
            }
            return IsNumber;
        }

        function formatCurrency(num) {
            num = num.toString().replace(/\$|\,/g, '');
            if (isNaN(num))
                num = "0";
            sign = (num == (num = Math.abs(num)));
            num = Math.floor(num * 100 + 0.50000000001);
            cents = num % 100;
            num = Math.floor(num / 100).toString();
            if (cents < 10)
                cents = "0" + cents;
            for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
                num = num.substring(0, num.length - (4 * i + 3)) + ',' +
            num.substring(num.length - (4 * i + 3));
            return (((sign) ? '' : '-') + '$' + num ); //+ '.' + cents
        }

        function HideTag(ptr) {
            if (ptr) {
                var ptrHandle = document.getElementById(ptr);
                if (ptrHandle) {
                    ptrHandle.style.display = "none";
                }
            }
        }

        function ShowTag(ptr) {
            if (ptr) {
                var ptrHandle = document.getElementById(ptr);
                if (ptrHandle) {
                    ptrHandle.style.display = "block";
                }
            }
        }

        function closeInstitutionNameWindow() {
            var divInstitutionNameWindow = document.getElementById('divInstitutionNameWindow');
            if (divInstitutionNameWindow)
                divInstitutionNameWindow.style.display = 'none';

        }

        function openInstitutionNameWindow() {
            if(showWelcomeMessage && showWelcomeMessage == true)
            {
                var divInstitutionNameWindow = document.getElementById('divInstitutionNameWindow');
                if (divInstitutionNameWindow)
                    divInstitutionNameWindow.style.display = '';
            }
        }
    </script>


<div style="margin:0;padding:0;padding-top:40px;color:#333333;background-color:#ffffff;line-height:17px;">
    <center>
    <div id="divInstitutionBanner" style="display:none;">
        <img id="imgInstitutionBanner" src="../../assets/includes/ge_templates/images/bannerplace.gif" alt="" title="" style="border:0px;" />
    </div>
    <div>
        <img src="../../assets/includes/ge_templates/images/border_top.png" alt="" title="" style="_margin:-3px;*margin:-3px;" />
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="796px">
    <tr>
        <td width="12px" style="background: url(../../assets/includes/ge_templates/images/border_left.png) repeat-y;"><img src="../../assets/includes/ge_templates/images/blank.gif" alt="" title="" /></td>
        <td align="left" valign="top" style="background-color:#fffef5;padding-top:17px;padding-bottom:20px;">
            
            <div id="divInstitutionNameWindow" style="position: absolute; display:none; width:436px;">
                <div style="position:relative; top:120px; left:54px; ">
                    <img src="../../assets/includes/ge_templates/images/instnm_popup_top.png" alt=""  style="_margin-bottom:-3px;*margin-bottom:-3px;" />
                    <div style="background-image:url(../../assets/includes/ge_templates/images/instnm_popup_middle.png); background-repeat:repeat-y; ">
                        <div style="padding:0px 10px 0px 35px;">
                            <div style="font-weight:bold; font-size:13px; color:#6699cc; font-family:Arial; text-align:left;width:350px;">Welcome to Erie Institute of Technology's Net Price Calculator!</div>
                            <div style="width:370px; height:170px; overflow:auto; margin-top:12px;font-weight:normal; font-size:13px; color:#333333; font-family:Arial; text-align:left;">Welcome to Erie Institute of Technology's net price calculator. Begin by reading and agreeing to the statement below. Then follow the instructions on the subsequent screens to receive an estimate of how much students similar to you paid to attend Erie Institute of Technology in 2012-13.</div>
                            <div style="margin-top:10px; margin-left:auto; margin-right:auto; width:50px; ">
                                <img src="../../assets/includes/ge_templates/images/button_ok.gif" alt="Ok" title="Ok" style="cursor:pointer;" onclick="closeInstitutionNameWindow()" />
                            </div>
                        </div>
                    </div>
                    <img src="../../assets/includes/ge_templates/images/instnm_popup_bottom.png" alt="" />
                </div>
            </div>


            <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td valign="top" align="left" style="padding-left:10px; padding-bottom:10px;">
                    <!-- dv_npc_s1_t -->
                    <div id="dv_npc_s1_t" style="display:none; margin-bottom:13px;">
                        <b>Step <span id="s_step1">1</span>:</b> Please provide the requested information. Your responses will be used to 
                        calculate an estimated amount that students like you paid - after grant aid and scholarships but before 
                        student loans - to attend this institution in a given year.
                    </div>
                    <!-- dv_npc_s2_t -->
                    <div id="dv_npc_s2_t" style="display:none; margin-bottom:13px;">
                        <b>Step <span id="s_step2"></span>:</b> Please provide the following information and then click Continue.
                    </div>
                    <!-- dv_npc_s3_t -->
                    <div id="dv_npc_s3_t" style="display:none; margin-bottom:13px;">
                        <b>Step <span id="s_step3"></span>:</b> For the purposes of this calculator, an independent student is 
                        one who is at least 24 years old, married, and/or has legal dependents other than a spouse (e.g., children). 
                        A student who does not meet any of the above criteria is considered dependent. 
                        <br /><br />
                        Based on the information you provided in previous steps, your 
                        dependency status is estimated to be <b>Dependent</b>.  Please provide the following information and then click Continue.
                        <br />
                    </div>
                    <!-- dv_npc_s4_t -->
                    <div id="dv_npc_s4_t" style="display:none; margin-bottom:13px;">
                        <b>Step <span id="s_step4"></span>:</b> For the purposes of this calculator, an independent student is 
                        one who is at least 24 years old, married, and/or has legal dependents other than a spouse (e.g., children). 
                        A student who does not meet any of the above criteria is considered dependent. 
                        <br /><br /> Based on the information you provided in previous steps, your 
                        dependency status is estimated to be <b>Independent</b>.  Please provide the following information and then click Continue.
                    </div>
                    <!-- summary header -->
                    <div id="dv_npc_s5_t" style="display:none; margin-bottom:13px;">
                        <span id="s_step5" style="display:none"></span>Review the information you have provided. You can click Modify to return to Step 1 and edit this information, 
                        or if you are happy with the current selections, click Continue to receive your <b>estimated</b> net price.
                    </div>
                    <!-- dv_npc_s6_t -->
                    <div id="dv_npc_s6_t" style="display:none; margin-bottom:13px;">
                        <span id="s_step6" style="display:none;"></span>                        
                        <div id="dv_npc_s6_academic" style="">Based on the information you have provided, the following calculations represent the average net price of attendance that students similar to you paid in the given year:</div>
                        <div id="dv_npc_s6_program" style="display:none;">Based on the information you have provided, the following calculations represent the average net price of attendance that students similar to you paid in the given year. This information applies only to the <span style="font-weight:bold; color:#cc6600;">##LARGESTPROGRAM##</span>&nbsp;program at the institution, which typically takes an average of <span style="font-weight:bold; color:#cc6600;">##NUMBEROFMONTHS##</span>&nbsp;months for a full-time student to complete. Prices may vary depending on the program of interest and its expected duration.</div>
                    </div>
                    <div style="">
                        <table border="0" cellpadding="0" cellspacing="0" width="525px" style="table-layout:fixed;">
                            <tr>
                                <td align="left" valign="top" width="10px"><img src="../../assets/includes/ge_templates/images/npcb_top_left.gif" alt="" title="" /></td>
                                <td align="left" valign="top" style="background-image:url(../../assets/includes/ge_templates/images/npcb_top_center.gif);"><img src="../../assets/includes/ge_templates/images/blank.gif" /></td>
                                <td align="left" valign="top" width="10px"><img src="../../assets/includes/ge_templates/images/npcb_top_right.gif" alt="" title="" /></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" style="background:url(../../assets/includes/ge_templates/images/npcb_middle_left.gif) repeat-y;"></td>
                                <td align="left" valign="top" style="padding:6px 10px 10px 8px; background-color:#dfecf1;">
                                    <!-- dv_npc_s0 -->
                                    <div id="dv_npc_s0" style="line-height:17px;">
                                        <strong>Please read.</strong>
                                        This calculator is intended to provide <i>estimated</i> net price information (defined as estimated cost of attendance &mdash; including tuition and required fees, books and supplies, room and board (meals), and other related expenses &mdash; minus estimated grant and scholarship aid) to current and prospective students and their families based on what similar students paid in a previous year.
                                        <br /><br />
                                        By clicking below, I acknowledge that the estimate provided using this calculator does not represent 
                                        a final determination, or actual award, of financial assistance, or a final net price; it is an 
                                        estimate based on cost of attendance and financial aid provided to students in a previous year. 
                                        Cost of attendance and financial aid availability change year to year. The estimates shall 
                                        not be binding on the Secretary of Education, the institution of higher education, or the State.
                                        <br /><br /> 
                                        Students must complete the Free Application for Federal Student Aid (FAFSA) in order to be eligible for, 
                                        and receive, an actual financial aid award that includes Federal grant, loan, or work-study assistance. 
                                        For more information on applying for Federal student aid, go to <a href="http://www.fafsa.ed.gov/" target="_blank">http://www.fafsa.ed.gov/</a>                                        
                                        <div style="font-size:11px; margin-top:25px; margin-bottom:10px;line-height:14px;"><b>Note:</b> Any information that you provide on this site is confidential. The Net Price Calculator does not store your responses or ask for personal identifying information of any kind.</div>
                                        <div style="text-align:center; margin-top:30px;">
                                            <a href="JavaScript:GoNext()"><img src="../../assets/includes/ge_templates/images/button_iagree.gif" alt="I Agree" title="I Agree" style="border-width:0px;"/></a>                                        
                                        </div>                                        
                                    </div>
                                
                                    <!-- dv_npc_s1 -->
                                    <div id="dv_npc_s1" style="display:none;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable">
                                        <tr>
                                            <td align="left" valign="top" width="140px"><span class="title1">Financial aid:</span></td>
                                            <td align="left" valign="top" style="padding-left:6px;">
                                                <span class="title2">Do you plan to apply for financial aid?</span><br />
                                                <span id="s_fa_0"><input type="radio" name="rb_financialaid" value="0" />Yes</span>&nbsp;&nbsp;
                                                <span id="s_fa_1"><input type="radio" name="rb_financialaid" value="1" />No</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="middle" width="140px"><span class="title1">Age:</span></td>
                                            <td align="left" valign="top" style="padding-left:6px;"><span class="title2">How old are you?</span> <input id="txt_age" type="text" value="" size="6" maxlength="4" /></td>
                                        </tr>
                                        <tr id="tr_ls">
                                            <td align="left" valign="top" width="140px"><span class="title1">Living arrangement:</span></td>
                                            <td align="left" valign="top" style="padding-left:6px;">
                                                <span class="title2">Where do you plan to live while attending this institution?</span><br />
                                                <span id="s_ls_0"><input type="radio" name="rb_livingstatus" value="##rb_livingstatus_0##" title="On-campus (in a residence hall, dormitory, or on-campus apartment)" />On-campus (in a residence hall, dormitory, or on-campus apartment)<br /></span>
                                                <span id="s_ls_1"><input type="radio" name="rb_livingstatus" value="0" title="Living on my own or with a roommate" />Living on my own or with a roommate<br /></span>
                                                <span id="s_ls_2"><input type="radio" name="rb_livingstatus" value="1" title="Living with my parents or other family members" />Living with my parents or other family members<br /></span>
                                            </td>
                                        </tr>
                                        <tr id="tr_rs">
                                            <td align="left" valign="top" width="140px"><span class="title1">Residency:</span></td>
                                            <td align="left" valign="top" style="padding-left:6px;">
                                                <span id="s_rs_0"><input type="radio" name="rb_residencystatus" value="##rb_residencystatus_0##" title="Eligible for in-district tuition" />Eligible for in-district tuition<br /></span>
                                                <span id="s_rs_1"><input type="radio" name="rb_residencystatus" value="##rb_residencystatus_1##" title="Eligible for in-state tuition" />Eligible for in-state tuition<br /></span>
                                                <span id="s_rs_2"><input type="radio" name="rb_residencystatus" value="##rb_residencystatus_2##" title="Eligible for out-of-state tuition" />Eligible for out-of-state tuition<br /></span>
                                            </td>
                                        </tr>                                        
                                        <tr>
                                            <td align="left" valign="top" width="140px" style="font-weight:bold;">&nbsp;</td>
                                            <td align="left" valign="top" style="padding-left:6px;padding-bottom:0px; padding-top:10px;">
                                                <a href="javascript:GoPrevious()"><img src="../../assets/includes/ge_templates/images/icon_previous.gif" border="0" alt="Previous" title="Previous" /></a>
                                                &nbsp;&nbsp;
                                                <a href="javascript:GoNext()"><img src="../../assets/includes/ge_templates/images/icon_continue.gif" border="0" alt="Continue" title="Continue" /></a>
                                            </td>
                                        </tr>
                                        </table>
                                    </div>
                                
                                    <!-- dv_npc_s2 -->
                                    <div id="dv_npc_s2" style="display:none;">
                                        <table id="tblMaritalStatusQuestion" border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable">
                                        <tr>
                                            <td align="left" valign="top" width="140px"><span class="title1">Marital Status:</span></td>
                                            <td align="left" valign="top" style="padding-left:6px;">
                                                <span class="title2">Are you (the student) married?</span><br />
                                                <span style="font-size:10px;">(Answer "yes" if you are separated but not divorced.)</span><br />
                                                <span><input type="radio" name="rb_maritalstatus" value="1" />Yes<br />
                                                <input type="radio" name="rb_maritalstatus" value="0" />No</span>                                            
                                            </td>
                                        </tr>
                                        </table>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable">
                                        <tr>
                                            <td align="left" valign="top" width="140px"><span class="title1">Children:</span></td>
                                            <td align="left" valign="top" style="padding-left:6px;">
                                                <span class="title2">Are you (the student) the primary source of financial support for any children?</span><br />
                                                <span><input type="radio" name="rb_numberofchildren" value="1" />Yes<br />
                                                <input type="radio" name="rb_numberofchildren" value="0" />No<br /></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="140px" style="font-weight:bold;">&nbsp;</td>
                                            <td align="left" valign="top" style="padding-left:6px;padding-bottom:0px; padding-top:10px;">
                                                <a href="javascript:GoPrevious()"><img src="../../assets/includes/ge_templates/images/icon_previous.gif" border="0" alt="Previous" title="Previous" /></a>
                                                &nbsp;&nbsp;
                                                <a href="javascript:GoNext()"><img src="../../assets/includes/ge_templates/images/icon_continue.gif" border="0" alt="Continue" title="Continue" /></a>
                                            </td>
                                        </tr>
                                        </table>
                                    </div>
                                
                                    <!-- dv_npc_s3 -->
                                    <div id="dv_npc_s3" style="display:none;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable">
                                        <tr>
                                            <td align="left" valign="top" width="140px" style="padding-bottom:0px;"><span class="title1">Number in Family:</span></td>
                                            <td align="left" valign="top" style="padding-left:6px;padding-right:6px;padding-bottom:0px;">
                                                <span class="title2">How many people are in your family's household?</span><br />
                                                <span style="font-size:10px;line-height:14px;">(Count yourself, your parent(s), and your parents' other dependent children.)</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="middle" width="140px" style="font-weight:bold;padding-bottom:0px;">&nbsp;</td>
                                            <td align="left" valign="middle" style="padding-top:3px;padding-left:6px;padding-bottom:15px;">
                                                <input type="radio" name="rb_numinfamily_dep" id="rb_numinfamily_dep2" value="Two|2" /><label for="rb_numinfamily_dep2">Two</label><br />
                                                <input type="radio" name="rb_numinfamily_dep" id="rb_numinfamily_dep3" value="Three|3" /><label for="rb_numinfamily_dep3">Three</label><br />
                                                <input type="radio" name="rb_numinfamily_dep" id="rb_numinfamily_dep4" value="Four|4" /><label for="rb_numinfamily_dep4">Four</label><br />
                                                <input type="radio" name="rb_numinfamily_dep" id="rb_numinfamily_dep5" value="Five|5" /><label for="rb_numinfamily_dep5">Five</label><br />
                                                <input type="radio" name="rb_numinfamily_dep" id="rb_numinfamily_dep6" value="Six or more|6" /><label for="rb_numinfamily_dep6">Six or more</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="140px" style="padding-bottom:0px;"><span class="title1">Number in College:</span></td>
                                            <td align="left" valign="top" style="padding-left:6px;padding-right:6px;padding-bottom:0px;">
                                                <span class="title2">Of the number in your family above, how many will be in college next year?</span><br />
                                                <span style="font-size:10px;line-height:14px;">(Count yourself and your siblings; do not count your parents.)</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="middle" width="140px" style="font-weight:bold;padding-bottom:0px;">&nbsp;</td>
                                            <td align="left" valign="middle" style="padding-top:3px;padding-left:6px;padding-bottom:15px;">
                                                <input type="radio" name="rb_numincollege_dep" id="rb_numincollege_dep1" value="One child|1" /><label for="rb_numincollege_dep1">One child</label><br />
                                                <input type="radio" name="rb_numincollege_dep" id="rb_numincollege_dep2" value="Two children|2" /><label for="rb_numincollege_dep2">Two children</label><br />
                                                <input type="radio" name="rb_numincollege_dep" id="rb_numincollege_dep3" value="Three or more children|3" /><label for="rb_numincollege_dep3">Three or more children</label><br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="140px"><span class="title1">Household Income:</span></td>
                                            <td align="left" valign="top" style="padding-left:6px;">
                                                <span class="title2">What is your annual household income after taxes?</span><br />
                                                <ul style="font-size:10px;margin:0px 0px 0px 20px;padding:5px;line-height:14px;">
                                                    <li>Include income earned by yourself and your parent(s).</li>
                                                    <li>Include income from work, child support, and other sources.</li>
                                                    <li>If your parent is single, separated, or divorced, include the income for the parent with whom you live.</li>
                                                    <li>If the parent with whom you live is remarried, include both your parent's income and his/her spouse's income.</li>
                                                </ul>
                                                <input type="radio" name="rb_householdincome_dep" value="0" />Less than $30,000<br />
                                                <input type="radio" name="rb_householdincome_dep" value="1" />Between $30,000 - $39,999<br />
                                                <input type="radio" name="rb_householdincome_dep" value="2" />Between $40,000 - $49,999<br />
                                                <input type="radio" name="rb_householdincome_dep" value="3" />Between $50,000 - $59,999<br />
                                                <input type="radio" name="rb_householdincome_dep" value="4" />Between $60,000 - $69,999<br />
                                                <input type="radio" name="rb_householdincome_dep" value="5" />Between $70,000 - $79,999<br />
                                                <input type="radio" name="rb_householdincome_dep" value="6" />Between $80,000 - $89,999<br />
                                                <input type="radio" name="rb_householdincome_dep" value="7" />Between $90,000 - $99,999<br />
                                                <input type="radio" name="rb_householdincome_dep" value="8" />Above $99,999<br />                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="140px" style="font-weight:bold;">&nbsp;</td>
                                            <td align="left" valign="top" style="padding-left:6px;padding-bottom:0px; padding-top:10px;">
                                                <a href="javascript:GoPrevious()"><img src="../../assets/includes/ge_templates/images/icon_previous.gif" border="0" alt="Previous" title="Previous" /></a>
                                                &nbsp;&nbsp;
                                                <a href="javascript:GoNext()"><img src="../../assets/includes/ge_templates/images/icon_continue.gif" border="0" alt="Continue" title="Continue" /></a>
                                            </td>
                                        </tr>
                                        </table>
                                    </div>
                                
                                    <!-- dv_npc_s4 -->
                                    <div id="dv_npc_s4" style="display:none;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable">
                                        <tr>
                                            <td align="left" valign="top" width="140px" style="padding-bottom:0px;"><span class="title1">Number in Family:</span></td>
                                            <td align="left" valign="top" style="padding-right:6px;padding-left:6px;padding-bottom:0px;">
                                                <span class="title2">How many people are in your family's household?</span><br />
                                                <span id="spanNumInFamilyHint" style="display:none;font-size:10px;line-height:14px;">Count yourself and your spouse (if applicable). </span>
                                                <span id="spanNumInFamilyHintWithChildren" style="display:none;font-size:10px;line-height:14px;">Count yourself, your spouse (if applicable), and any dependent children.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="middle" width="140px" style="font-weight:bold;padding-bottom:0px;">&nbsp;</td>
                                            <td align="left" valign="middle" style="padding-top:3px;padding-left:6px;padding-bottom:15px;">                                            
                                                <div id="divFirstOptionForNumInFamilyWithChildren" style="display:none;">
                                                    <input type="radio" name="rb_indnuminfamily" value="One|1" />One<br />
                                                </div>
                                                <input type="radio" name="rb_indnuminfamily" value="Two|2" />Two<br />
                                                <div id="divNumInFamilyWithChildren" style="display:none;">
                                                    <input type="radio" name="rb_indnuminfamily" value="Three|3" />Three<br />
                                                    <input type="radio" name="rb_indnuminfamily" value="Four|4" />Four<br />
                                                    <input type="radio" name="rb_indnuminfamily" value="Five|5" />Five<br />
                                                    <input type="radio" name="rb_indnuminfamily" value="Six or more|6" />Six or more<br />
                                                </div>                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="140px" style="padding-bottom:0px;"><span class="title1">Number in College:</span></td>
                                            <td align="left" valign="top" style="padding-right:6px;padding-left:6px;padding-bottom:0px;">
                                                <span class="title2">Of the number in your family above, how many will be in college next year?</span><br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="middle" width="140px" style="font-weight:bold;padding-bottom:0px;">&nbsp;</td>
                                            <td colspan="2" align="left" valign="middle" style="padding-top:3px;padding-left:6px;padding-right:6px;padding-bottom:15px;">
                                                <input type="radio" name="rb_indnumincollege" value="One|1" />One<br />
                                                <span id="spanIndNumInCollegeTwoOrMore" style="display:none;"><input type="radio" name="rb_indnumincollege" value="Two or more|2" />Two or more<br /></span>
                                                <span id="spanIndNumInCollegeTwo" style="display:none;"><input type="radio" name="rb_indnumincollege" value="Two|2" />Two<br /></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="140px"><span class="title1">Household Income:</span></td>
                                            <td align="left" valign="top" style="padding-left:6px;">
                                                <span class="title2">What is your annual household income after taxes?</span><br />
                                                <span style="font-size:10px;line-height:14px;">(Include income from work, child support, and other sources; if you are married, include your spouse's income.)</span><br /><br />
                                                <input type="radio" name="rb_householdincome_ind" value="0" />Less than $30,000<br />
                                                <input type="radio" name="rb_householdincome_ind" value="1" />Between $30,000 - $39,999<br />
                                                <input type="radio" name="rb_householdincome_ind" value="2" />Between $40,000 - $49,999<br />
                                                <input type="radio" name="rb_householdincome_ind" value="3" />Between $50,000 - $59,999<br />
                                                <input type="radio" name="rb_householdincome_ind" value="4" />Between $60,000 - $69,999<br />
                                                <input type="radio" name="rb_householdincome_ind" value="5" />Between $70,000 - $79,999<br />
                                                <input type="radio" name="rb_householdincome_ind" value="6" />Between $80,000 - $89,999<br />
                                                <input type="radio" name="rb_householdincome_ind" value="7" />Between $90,000 - $99,999<br />
                                                <input type="radio" name="rb_householdincome_ind" value="8" />Above $99,999<br />                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="140px" style="font-weight:bold;">&nbsp;</td>
                                            <td align="left" valign="top" style="padding-left:6px;padding-bottom:0px; padding-top:10px;">
                                                <a href="javascript:GoPrevious()"><img src="../../assets/includes/ge_templates/images/icon_previous.gif" border="0" alt="Previous" title="Previous" /></a>
                                                &nbsp;&nbsp;
                                                <a href="javascript:GoNext()"><img src="../../assets/includes/ge_templates/images/icon_continue.gif" border="0" alt="Continue" title="Continue" /></a>
                                            </td>
                                        </tr>
                                        </table>
                                    </div>
                                
                                    <!-- div with summary data -->
                                    <div id="dv_npc_s5" style="display:none;">
                                        <div id="dv_summary" class="summarytable" style="margin:0px 0px 0px 0px; padding:0px 0px 0px 0px;"></div>
                                        <div style="text-align:center;padding-bottom:0px; padding-top:20px;">
                                            <a href="javascript:ClearVars();GoTo('1');"><img src="../../assets/includes/ge_templates/images/icon_modify.gif" border="0" alt="Modify" title="Modify" /></a>
                                                &nbsp;&nbsp;
                                            <a href="javascript:GoNext()"><img src="../../assets/includes/ge_templates/images/icon_continue.gif" border="0" alt="Continue" title="Continue" /></a>
                                        </div>
                                    </div>
                                
                               

                                    <!-- dv_npc_s5 -->
                                    <div id="dv_npc_s6" style="display:none; margin-left:50px; margin-top:10px;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="width:387px;">
                                            <tr>
                                                <td><img src="../../assets/includes/ge_templates/images/notepad_top.jpg" alt="" /></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div style="background-image:url(../../assets/includes/ge_templates/images/notepad_middle.jpg); background-repeat:repeat-y;width:387px;">
                                                        <div style="padding:0px 10px 10px 25px; font-size:13px;">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable">
                                                                <tr>
                                                                    <td colspan="2" align="left" valign="top" style="padding-bottom:3px;">
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;color:#cc6600; font-size:14px;">Academic Year: 2012-13</span>
                                                                    <div><img src="../../assets/includes/ge_templates/images/divider_academicyear.gif" /></div>
                                                                </td>
                                                                </tr>
                                                                 <tr>
                                                                    <td align="left" valign="middle" width="220px" style="padding-top:7px;padding-left:20px; padding-bottom:3px;">Estimated tuition and fees</td>
                                                                    <td align="left" valign="top" style="width:95px;padding-top:7px;padding-left:2px; padding-bottom:3px;"><span id="s_etf" style="">$00,000</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="middle" width="220px" style="padding:3px;padding-left:5px;">
                                                                    <span style="font-weight:bold; font-size:13px; font-family:Verdana;">+</span> Estimated room and board charges
                                                                    <div style="font-size:10px;font-weight:normal;color:#666666;padding-left:17px;">(Includes rooming accommodations and meals)</div>
                                                                </td>
                                                                    <td align="left" valign="top" style="padding:3px;padding-left:2px;"><span id="s_erb" style="">$00,000</span></td>
                                                                </tr>                                       
                                                                <tr>
                                                                    <td align="left" valign="middle" width="220px" style="padding:3px;padding-left:5px;"><span style="font-weight:bold; font-size:13px; font-family:Verdana;">+</span> Estimated cost of books and &nbsp; &nbsp;&nbsp;supplies</td>
                                                                    <td align="left" valign="top" style="padding:3px;padding-left:2px;"><span id="s_ebs" style="">$00,000</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="middle" width="220px" style="padding:3px;padding-left:5px;"><span style="font-weight:bold; font-size:13px; font-family:Verdana;">+</span> Estimated other expenses<br />&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10px;font-weight:normal;color:#666666;">(Personal expenses, transportation, etc.)</span></td>
                                                                    <td align="left" valign="top" style="padding:3px;padding-left:2px;"><span id="s_eo" style="">$00,000</span></td>
                                                                </tr>
                                                            </table>

                                                            <div style="margin-top:10px; margin-bottom:8px; _margin-top:-2px; _margin-bottom:2px;">
                                                                <img src="../../assets/includes/ge_templates/images/divider_black.gif" />
                                                            </div>


                                                            <div style="width:329px; height:97px; background-image:url(../../assets/includes/ge_templates/images/output_bg_blue.jpg); background-repeat:no-repeat; ">
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable" style="margin-top:7px;">
                                                                    <tr>
                                                                        <td align="left" valign="middle" width="228px" style="padding-bottom:7px;padding-left:19px;">Estimated total cost of attendance:</td>
                                                                        <td align="left" valign="top" style="padding-bottom:7px;padding-left:2px;"><span id="s_etpoa">$00,000</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" valign="middle" width="228px" style="padding-top:2px; padding-left:8px; padding-bottom:0px;">
                                                                            <span style="font-weight:bold; font-size:14px; font-family:Verdana;">-</span> 
                                                                            <b>Estimated total grant aid:</b>
                                                                            <div style="font-size:10px;font-weight:normal;color:#666666; margin-left:11px; margin-top:3px; line-height:12px;">(Includes both merit and need based grant and scholarship aid from Federal, State, or Local Governments, or the Institution)</div>
                                                                        </td>
                                                                        <td align="left" valign="top" style="padding-top:2px;padding-left:2px; padding-bottom:0px;"><span id="s_etga" style="font-weight:bold;">$00,000</span></td>
                                                                    </tr>
                                                                </table>
                                                            </div>

                                                            <div style="margin-top:10px; margin-bottom:8px; _margin-top:-2px; _margin-bottom:2px;">
                                                                <img src="../../assets/includes/ge_templates/images/divider_black.gif" />
                                                            </div>

                                                            <div style="width:329px; height:50px; background-image:url(../../assets/includes/ge_templates/images/output_bg_orange.jpg); background-repeat:no-repeat; color:#ffffff; font-weight:bold; ">
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable"">                                        
                                                                    <tr>
                                                                        <td align="left" valign="middle" width="228px" style="padding-top:9px;padding-left:19px;font-size:13px;color:#ffffff;">Estimated Net Price After Grants and Scholarships:</td>
                                                                        <td align="left" valign="middle" style="padding-top:9px;padding-left:2px;font-size:13px;color:#ffffff;"><span id="s_enp">$00,000</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" align="left" valign="top" width="285px">
                                                                            <span id="s_step6_body"></span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div id="tr_requiredliveoncampus" style="display:none; margin-right:20px;font-size:11px; line-height:12px; color:#cc6600; margin-top:10px;">
                                                                This institution requires that full-time, first-time students live on-campus or in institutionally controlled housing.
                                                            </div>
                                                            <div style="margin-right:20px;font-size:11px; line-height:12px; margin-top:10px;">
                                                                Grants and scholarships do not have to be repaid. Some students also qualify for student loans to assist in paying this net price; however, student loans do have to be repaid.
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="../../assets/includes/ge_templates/images/notepad_bottom.jpg" alt="" /></td>
                                            </tr>
                                        </table>
                                    </div>

                                        
                                
                                <div id="dv_npc_s6_r" class="disclaimer" style="display:none;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable" style="margin-top:10px;">
                                        <tr>
                                            <td colspan="2" align="left" valign="top" style="">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td align="left" valign="top" width="140px" style="font-weight:bold;">&nbsp;</td>
                                                        <td align="left" valign="top" style="padding-left:6px;padding-bottom:0px; padding-top:10px;">
                                                            <a href="javascript:GoPrevious()"><img src="../../assets/includes/ge_templates/images/icon_previous.gif" border="0" alt="Previous" title="Previous" /></a>
                                                            &nbsp;&nbsp;
                                                            <a href="javascript:StartOver();"><img src="../../assets/includes/ge_templates/images/icon_startover.gif" border="0" alt="Start Over" title="Start Over" /></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>


                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;margin-top:15px;">                                    
                                        <tr>
                                            <td align="left" valign="top" width="5px">&nbsp;</td>
                                            <td align="left" valign="top" style="padding:1px;">
                                                <b>Please Note:</b> The estimates above apply to <b>full-time, first-time degree/certificate-seeking undergraduate students</b> only.&nbsp;
                                                
                                                <br /><br />
                                                These estimates do not represent a final determination, or actual award, of financial assistance or a final net 
                                                price; they are only estimates based on cost of attendance and financial aid provided to students in 2012-13. 
                                                Cost of attendance and financial aid availability change year to year. These estimates shall not be binding on 
                                                the Secretary of Education, the institution of higher education, or the State.<br /><br />
                                            
                                                Not all students receive financial aid. In 2012-13, 97% of our full-time students enrolling 
                                                for college for the first time received grant/scholarship aid. Students may also be eligible 
                                                for student loans and work-study. Students must complete the Free Application for Federal Student 
                                                Aid (FAFSA) in order to determine their eligibility for Federal financial aid that includes 
                                                Federal grant, loan, or work-study assistance. For more information on applying for 
                                                Federal student aid, go to <a href="http://www.fafsa.ed.gov/" target="_blank">
                                                http://www.fafsa.ed.gov/</a>.&nbsp; 
                                                <br /><br />
                                                
                                                <br />
                                            </td>
                                            <td align="left" valign="top" width="5px">&nbsp;</td>
                                        </tr>                                    
                                    </table>
                                </div>
                            </td>
                            <td align="left" valign="top" style="background:url(../../assets/includes/ge_templates/images/npcb_middle_right.gif) repeat-y;"></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" width="10px"><img src="../../assets/includes/ge_templates/images/npcb_bottom_left.gif" alt="" title="" /></td>
                            <td align="left" valign="top" style="background-image:url(../../assets/includes/ge_templates/images/npcb_bottom_center.gif);"><img src="../../assets/includes/ge_templates/images/blank.gif" /></td>
                            <td align="left" valign="top" width="10px"><img src="../../assets/includes/ge_templates/images/npcb_bottom_right.gif" alt="" title="" /></td>
                        </tr>
                        </table>
                    </div>
                </td>
                <td valign="top" align="right" width="200px">
                    <img src="../../assets/includes/ge_templates/images/bg_r.jpg" alt="" title="" />
                    <div style="margin:35px 0px 0px 10px; text-align:left;">
                        <noscript>
                            <img id="imgJavaScriptNote" src="../../assets/includes/ge_templates/images/javascript_note.gif" alt="You must have JavaScript enabled in your browser to use this site." title="You must have JavaScript enabled in your browser to use this site." />
                        </noscript>
                    </div>
                </td>
            </tr>
            </table>
        </td>
        <td  width="12px" style="background: url(../../assets/includes/ge_templates/images/border_right.png) repeat-y;"><img src="../../assets/includes/ge_templates/images/blank.gif" alt="" title="" /></td>
    </tr>
    <tr>
        <td width="12px"><img src="../../assets/includes/ge_templates/images/border_bottom_left.png" alt="" title="" /></td>
        <td style="background:url(../../assets/includes/ge_templates/images/border_bottom_center.png) repeat-x;"><img src="../../assets/includes/ge_templates/images/blank.gif" alt="" title="" /></td>
        <td width="12px"><img src="../../assets/includes/ge_templates/images/border_bottom_right.png" alt="" title="" /></td>
    </tr>
    </table>
    </center>
    
    <script type='text/javascript'>function SetupConstants() {HideTag('s_ls_0');
numberoflivingstatus = 2;
HideTag('s_rs_0');
HideTag('s_rs_1');
HideTag('s_rs_2');
HideTag('tr_rs');
npc1_residencystatus = -1;
}; SetupConstants(); var showWelcomeMessage = true; openInstitutionNameWindow();</script>
</div>