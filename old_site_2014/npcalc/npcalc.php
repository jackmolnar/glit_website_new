
    <style type="text/css">
        input 
        {
            font-family:Verdana;
            font-size:12px;
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
            font-family:Verdana;
            font-weight:normal;
            font-size:11px;
            color:#b20101;
            text-align:left;
        }        
        .summarytable td
        {
            border-bottom:solid 1px #c7ddea;        
            padding: 6px 1px 7px 4px;
        }
        .boldtd {
            font-weight:bold;
            font-family: Verdana;
            font-size:12px;
            color:#336699;
            width:150px;
        }
        .title1
        {
            color:#336699;
            font-family:Verdana;
            font-size:12px;
            font-weight:bold;
        }
        .title2
        {
            color:#333333;
            font-family:Verdana;
            font-size:12px;
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
efcDependent[0].incomeRanges[0] = 0;  efcDependent[0].incomeRanges[1] = 1662;  efcDependent[0].incomeRanges[2] = 3838;  efcDependent[0].incomeRanges[3] = 6233;  efcDependent[0].incomeRanges[4] = 9213;  efcDependent[0].incomeRanges[5] = 12598;  efcDependent[0].incomeRanges[6] = 16073;  efcDependent[0].incomeRanges[7] = 19652;  efcDependent[0].incomeRanges[8] = 31988;  
efcDependent[1] = {};
efcDependent[1].numberInCollege=1;
efcDependent[1].numberInFamily=3;
efcDependent[1].incomeRanges= []; 
efcDependent[1].incomeRanges[0] = 0;  efcDependent[1].incomeRanges[1] = 1148;  efcDependent[1].incomeRanges[2] = 3345;  efcDependent[1].incomeRanges[3] = 5671;  efcDependent[1].incomeRanges[4] = 8505;  efcDependent[1].incomeRanges[5] = 11903;  efcDependent[1].incomeRanges[6] = 15457;  efcDependent[1].incomeRanges[7] = 19000;  efcDependent[1].incomeRanges[8] = 33515;  
efcDependent[2] = {};
efcDependent[2].numberInCollege=1;
efcDependent[2].numberInFamily=4;
efcDependent[2].incomeRanges= []; 
efcDependent[2].incomeRanges[0] = 0;  efcDependent[2].incomeRanges[1] = 322;  efcDependent[2].incomeRanges[2] = 2499;  efcDependent[2].incomeRanges[3] = 4632;  efcDependent[2].incomeRanges[4] = 7038;  efcDependent[2].incomeRanges[5] = 10235;  efcDependent[2].incomeRanges[6] = 13750;  efcDependent[2].incomeRanges[7] = 17322;  efcDependent[2].incomeRanges[8] = 32834;  
efcDependent[3] = {};
efcDependent[3].numberInCollege=1;
efcDependent[3].numberInFamily=5;
efcDependent[3].incomeRanges= []; 
efcDependent[3].incomeRanges[0] = 0;  efcDependent[3].incomeRanges[1] = 0;  efcDependent[3].incomeRanges[2] = 1605;  efcDependent[3].incomeRanges[3] = 3641;  efcDependent[3].incomeRanges[4] = 5871;  efcDependent[3].incomeRanges[5] = 8764;  efcDependent[3].incomeRanges[6] = 12239;  efcDependent[3].incomeRanges[7] = 15864;  efcDependent[3].incomeRanges[8] = 31509;  
efcDependent[4] = {};
efcDependent[4].numberInCollege=1;
efcDependent[4].numberInFamily=6;
efcDependent[4].incomeRanges= []; 
efcDependent[4].incomeRanges[0] = 0;  efcDependent[4].incomeRanges[1] = 0;  efcDependent[4].incomeRanges[2] = 100;  efcDependent[4].incomeRanges[3] = 2208;  efcDependent[4].incomeRanges[4] = 4317;  efcDependent[4].incomeRanges[5] = 6714;  efcDependent[4].incomeRanges[6] = 9983;  efcDependent[4].incomeRanges[7] = 13653;  efcDependent[4].incomeRanges[8] = 28644;  
efcDependent[5] = {};
efcDependent[5].numberInCollege=2;
efcDependent[5].numberInFamily=2;
efcDependent[5].incomeRanges= []; 
efcDependent[5].incomeRanges[0] = 0;  efcDependent[5].incomeRanges[1] = 1233;  efcDependent[5].incomeRanges[2] = 2538;  efcDependent[5].incomeRanges[3] = 3589;  efcDependent[5].incomeRanges[4] = 5014;  efcDependent[5].incomeRanges[5] = 6773;  efcDependent[5].incomeRanges[6] = 13372;  efcDependent[5].incomeRanges[7] = 9297;  efcDependent[5].incomeRanges[8] = 27844;  
efcDependent[6] = {};
efcDependent[6].numberInCollege=2;
efcDependent[6].numberInFamily=3;
efcDependent[6].incomeRanges= []; 
efcDependent[6].incomeRanges[0] = 0;  efcDependent[6].incomeRanges[1] = 839;  efcDependent[6].incomeRanges[2] = 2005;  efcDependent[6].incomeRanges[3] = 3374;  efcDependent[6].incomeRanges[4] = 5085;  efcDependent[6].incomeRanges[5] = 6794;  efcDependent[6].incomeRanges[6] = 8614;  efcDependent[6].incomeRanges[7] = 10326;  efcDependent[6].incomeRanges[8] = 17064;  
efcDependent[7] = {};
efcDependent[7].numberInCollege=2;
efcDependent[7].numberInFamily=4;
efcDependent[7].incomeRanges= []; 
efcDependent[7].incomeRanges[0] = 0;  efcDependent[7].incomeRanges[1] = 549;  efcDependent[7].incomeRanges[2] = 1697;  efcDependent[7].incomeRanges[3] = 2949;  efcDependent[7].incomeRanges[4] = 4526;  efcDependent[7].incomeRanges[5] = 6192;  efcDependent[7].incomeRanges[6] = 7988;  efcDependent[7].incomeRanges[7] = 9775;  efcDependent[7].incomeRanges[8] = 18327;  
efcDependent[8] = {};
efcDependent[8].numberInCollege=2;
efcDependent[8].numberInFamily=5;
efcDependent[8].incomeRanges= []; 
efcDependent[8].incomeRanges[0] = 0;  efcDependent[8].incomeRanges[1] = 83;  efcDependent[8].incomeRanges[2] = 1226;  efcDependent[8].incomeRanges[3] = 2357;  efcDependent[8].incomeRanges[4] = 3728;  efcDependent[8].incomeRanges[5] = 5410;  efcDependent[8].incomeRanges[6] = 7182;  efcDependent[8].incomeRanges[7] = 8974;  efcDependent[8].incomeRanges[8] = 17646;  
efcDependent[9] = {};
efcDependent[9].numberInCollege=2;
efcDependent[9].numberInFamily=6;
efcDependent[9].incomeRanges= []; 
efcDependent[9].incomeRanges[0] = 0;  efcDependent[9].incomeRanges[1] = 0;  efcDependent[9].incomeRanges[2] = 401;  efcDependent[9].incomeRanges[3] = 1567;  efcDependent[9].incomeRanges[4] = 2764;  efcDependent[9].incomeRanges[5] = 4318;  efcDependent[9].incomeRanges[6] = 6054;  efcDependent[9].incomeRanges[7] = 7847;  efcDependent[9].incomeRanges[8] = 16192;  
efcDependent[10] = {};
efcDependent[10].numberInCollege=3;
efcDependent[10].numberInFamily=3;
efcDependent[10].incomeRanges= []; 
efcDependent[10].incomeRanges[0] = 0;  efcDependent[10].incomeRanges[1] = 915;  efcDependent[10].incomeRanges[2] = 1706;  efcDependent[10].incomeRanges[3] = 2358;  efcDependent[10].incomeRanges[4] = 3328;  efcDependent[10].incomeRanges[5] = 5120;  efcDependent[10].incomeRanges[6] = 7358;  efcDependent[10].incomeRanges[7] = 6197;  efcDependent[10].incomeRanges[8] = 10648;  
efcDependent[11] = {};
efcDependent[11].numberInCollege=3;
efcDependent[11].numberInFamily=4;
efcDependent[11].incomeRanges= []; 
efcDependent[11].incomeRanges[0] = 0;  efcDependent[11].incomeRanges[1] = 413;  efcDependent[11].incomeRanges[2] = 1225;  efcDependent[11].incomeRanges[3] = 2124;  efcDependent[11].incomeRanges[4] = 3382;  efcDependent[11].incomeRanges[5] = 4619;  efcDependent[11].incomeRanges[6] = 5770;  efcDependent[11].incomeRanges[7] = 6899;  efcDependent[11].incomeRanges[8] = 11664;  
efcDependent[12] = {};
efcDependent[12].numberInCollege=3;
efcDependent[12].numberInFamily=5;
efcDependent[12].incomeRanges= []; 
efcDependent[12].incomeRanges[0] = 0;  efcDependent[12].incomeRanges[1] = 260;  efcDependent[12].incomeRanges[2] = 1048;  efcDependent[12].incomeRanges[3] = 1891;  efcDependent[12].incomeRanges[4] = 2961;  efcDependent[12].incomeRanges[5] = 4232;  efcDependent[12].incomeRanges[6] = 5416;  efcDependent[12].incomeRanges[7] = 6582;  efcDependent[12].incomeRanges[8] = 12831;  
efcDependent[13] = {};
efcDependent[13].numberInCollege=3;
efcDependent[13].numberInFamily=6;
efcDependent[13].incomeRanges= []; 
efcDependent[13].incomeRanges[0] = 0;  efcDependent[13].incomeRanges[1] = 0;  efcDependent[13].incomeRanges[2] = 462;  efcDependent[13].incomeRanges[3] = 1236;  efcDependent[13].incomeRanges[4] = 2092;  efcDependent[13].incomeRanges[5] = 3207;  efcDependent[13].incomeRanges[6] = 4436;  efcDependent[13].incomeRanges[7] = 5634;  efcDependent[13].incomeRanges[8] = 11372;  

var efcIndWithoutDep = []; 
efcIndWithoutDep[0] = {};
efcIndWithoutDep[0].numberInCollege=1;
efcIndWithoutDep[0].numberInFamily=1;
efcIndWithoutDep[0].incomeRanges= []; 
efcIndWithoutDep[0].incomeRanges[0] = 0;  efcIndWithoutDep[0].incomeRanges[1] = 10517;  efcIndWithoutDep[0].incomeRanges[2] = 14250;  efcIndWithoutDep[0].incomeRanges[3] = 18108;  efcIndWithoutDep[0].incomeRanges[4] = 22054;  efcIndWithoutDep[0].incomeRanges[5] = 25903;  efcIndWithoutDep[0].incomeRanges[6] = 29900;  efcIndWithoutDep[0].incomeRanges[7] = 34070.5;  efcIndWithoutDep[0].incomeRanges[8] = 49733;  
efcIndWithoutDep[1] = {};
efcIndWithoutDep[1].numberInCollege=1;
efcIndWithoutDep[1].numberInFamily=2;
efcIndWithoutDep[1].incomeRanges= []; 
efcIndWithoutDep[1].incomeRanges[0] = 672;  efcIndWithoutDep[1].incomeRanges[1] = 8286;  efcIndWithoutDep[1].incomeRanges[2] = 11986;  efcIndWithoutDep[1].incomeRanges[3] = 15852;  efcIndWithoutDep[1].incomeRanges[4] = 19648;  efcIndWithoutDep[1].incomeRanges[5] = 23491;  efcIndWithoutDep[1].incomeRanges[6] = 27325;  efcIndWithoutDep[1].incomeRanges[7] = 31081;  efcIndWithoutDep[1].incomeRanges[8] = 44262;  
efcIndWithoutDep[2] = {};
efcIndWithoutDep[2].numberInCollege=2;
efcIndWithoutDep[2].numberInFamily=2;
efcIndWithoutDep[2].incomeRanges= []; 
efcIndWithoutDep[2].incomeRanges[0] = 1206;  efcIndWithoutDep[2].incomeRanges[1] = 5119;  efcIndWithoutDep[2].incomeRanges[2] = 7005;  efcIndWithoutDep[2].incomeRanges[3] = 8953;  efcIndWithoutDep[2].incomeRanges[4] = 10871;  efcIndWithoutDep[2].incomeRanges[5] = 12767;  efcIndWithoutDep[2].incomeRanges[6] = 14727;  efcIndWithoutDep[2].incomeRanges[7] = 16566;  efcIndWithoutDep[2].incomeRanges[8] = 22169.5;  

var efcIndWithDep = []; 
efcIndWithDep[0] = {};
efcIndWithDep[0].numberInCollege=1;
efcIndWithDep[0].numberInFamily=2;
efcIndWithDep[0].incomeRanges= []; 
efcIndWithDep[0].incomeRanges[0] = 0;  efcIndWithDep[0].incomeRanges[1] = 1637;  efcIndWithDep[0].incomeRanges[2] = 3443;  efcIndWithDep[0].incomeRanges[3] = 5690;  efcIndWithDep[0].incomeRanges[4] = 8862;  efcIndWithDep[0].incomeRanges[5] = 12472;  efcIndWithDep[0].incomeRanges[6] = 15990;  efcIndWithDep[0].incomeRanges[7] = 19521;  efcIndWithDep[0].incomeRanges[8] = 31434;  
efcIndWithDep[1] = {};
efcIndWithDep[1].numberInCollege=1;
efcIndWithDep[1].numberInFamily=3;
efcIndWithDep[1].incomeRanges= []; 
efcIndWithDep[1].incomeRanges[0] = 0;  efcIndWithDep[1].incomeRanges[1] = 1026;  efcIndWithDep[1].incomeRanges[2] = 2879;  efcIndWithDep[1].incomeRanges[3] = 4967;  efcIndWithDep[1].incomeRanges[4] = 7722;  efcIndWithDep[1].incomeRanges[5] = 11301;  efcIndWithDep[1].incomeRanges[6] = 14865;  efcIndWithDep[1].incomeRanges[7] = 18368;  efcIndWithDep[1].incomeRanges[8] = 28063;  
efcIndWithDep[2] = {};
efcIndWithDep[2].numberInCollege=1;
efcIndWithDep[2].numberInFamily=4;
efcIndWithDep[2].incomeRanges= []; 
efcIndWithDep[2].incomeRanges[0] = 0;  efcIndWithDep[2].incomeRanges[1] = 143;  efcIndWithDep[2].incomeRanges[2] = 2044.5;  efcIndWithDep[2].incomeRanges[3] = 3933;  efcIndWithDep[2].incomeRanges[4] = 6320;  efcIndWithDep[2].incomeRanges[5] = 9661;  efcIndWithDep[2].incomeRanges[6] = 13299;  efcIndWithDep[2].incomeRanges[7] = 16837;  efcIndWithDep[2].incomeRanges[8] = 26430;  
efcIndWithDep[3] = {};
efcIndWithDep[3].numberInCollege=1;
efcIndWithDep[3].numberInFamily=5;
efcIndWithDep[3].incomeRanges= []; 
efcIndWithDep[3].incomeRanges[0] = 0;  efcIndWithDep[3].incomeRanges[1] = 0;  efcIndWithDep[3].incomeRanges[2] = 1072;  efcIndWithDep[3].incomeRanges[3] = 2926;  efcIndWithDep[3].incomeRanges[4] = 5074;  efcIndWithDep[3].incomeRanges[5] = 7911;  efcIndWithDep[3].incomeRanges[6] = 11611;  efcIndWithDep[3].incomeRanges[7] = 15236;  efcIndWithDep[3].incomeRanges[8] = 24769;  
efcIndWithDep[4] = {};
efcIndWithDep[4].numberInCollege=1;
efcIndWithDep[4].numberInFamily=6;
efcIndWithDep[4].incomeRanges= []; 
efcIndWithDep[4].incomeRanges[0] = 0;  efcIndWithDep[4].incomeRanges[1] = 0;  efcIndWithDep[4].incomeRanges[2] = 0;  efcIndWithDep[4].incomeRanges[3] = 1513;  efcIndWithDep[4].incomeRanges[4] = 3381;  efcIndWithDep[4].incomeRanges[5] = 5733;  efcIndWithDep[4].incomeRanges[6] = 8928;  efcIndWithDep[4].incomeRanges[7] = 12738;  efcIndWithDep[4].incomeRanges[8] = 22158.5;  
efcIndWithDep[5] = {};
efcIndWithDep[5].numberInCollege=2;
efcIndWithDep[5].numberInFamily=2;
efcIndWithDep[5].incomeRanges= []; 
efcIndWithDep[5].incomeRanges[0] = 0;  efcIndWithDep[5].incomeRanges[1] = 1152;  efcIndWithDep[5].incomeRanges[2] = 2093;  efcIndWithDep[5].incomeRanges[3] = 3294;  efcIndWithDep[5].incomeRanges[4] = 5061;  efcIndWithDep[5].incomeRanges[5] = 6666;  efcIndWithDep[5].incomeRanges[6] = 8505.5;  efcIndWithDep[5].incomeRanges[7] = 10170;  efcIndWithDep[5].incomeRanges[8] = 15498;  
efcIndWithDep[6] = {};
efcIndWithDep[6].numberInCollege=2;
efcIndWithDep[6].numberInFamily=3;
efcIndWithDep[6].incomeRanges= []; 
efcIndWithDep[6].incomeRanges[0] = 0;  efcIndWithDep[6].incomeRanges[1] = 888;  efcIndWithDep[6].incomeRanges[2] = 1790;  efcIndWithDep[6].incomeRanges[3] = 2934;  efcIndWithDep[6].incomeRanges[4] = 4605;  efcIndWithDep[6].incomeRanges[5] = 6314.5;  efcIndWithDep[6].incomeRanges[6] = 8089;  efcIndWithDep[6].incomeRanges[7] = 9798.5;  efcIndWithDep[6].incomeRanges[8] = 14646.5;  
efcIndWithDep[7] = {};
efcIndWithDep[7].numberInCollege=2;
efcIndWithDep[7].numberInFamily=4;
efcIndWithDep[7].incomeRanges= []; 
efcIndWithDep[7].incomeRanges[0] = 0;  efcIndWithDep[7].incomeRanges[1] = 432;  efcIndWithDep[7].incomeRanges[2] = 1313;  efcIndWithDep[7].incomeRanges[3] = 2300;  efcIndWithDep[7].incomeRanges[4] = 3652;  efcIndWithDep[7].incomeRanges[5] = 5347;  efcIndWithDep[7].incomeRanges[6] = 7079;  efcIndWithDep[7].incomeRanges[7] = 8774;  efcIndWithDep[7].incomeRanges[8] = 13030;  
efcIndWithDep[8] = {};
efcIndWithDep[8].numberInCollege=2;
efcIndWithDep[8].numberInFamily=5;
efcIndWithDep[8].incomeRanges= []; 
efcIndWithDep[8].incomeRanges[0] = 0;  efcIndWithDep[8].incomeRanges[1] = 0;  efcIndWithDep[8].incomeRanges[2] = 847;  efcIndWithDep[8].incomeRanges[3] = 1728;  efcIndWithDep[8].incomeRanges[4] = 2871;  efcIndWithDep[8].incomeRanges[5] = 4435;  efcIndWithDep[8].incomeRanges[6] = 6139;  efcIndWithDep[8].incomeRanges[7] = 7821;  efcIndWithDep[8].incomeRanges[8] = 11893.5;  
efcIndWithDep[9] = {};
efcIndWithDep[9].numberInCollege=2;
efcIndWithDep[9].numberInFamily=6;
efcIndWithDep[9].incomeRanges= []; 
efcIndWithDep[9].incomeRanges[0] = 0;  efcIndWithDep[9].incomeRanges[1] = 0;  efcIndWithDep[9].incomeRanges[2] = 167;  efcIndWithDep[9].incomeRanges[3] = 985;  efcIndWithDep[9].incomeRanges[4] = 1866;  efcIndWithDep[9].incomeRanges[5] = 2986;  efcIndWithDep[9].incomeRanges[6] = 4546.5;  efcIndWithDep[9].incomeRanges[7] = 6184;  efcIndWithDep[9].incomeRanges[8] = 10154.5;  
        
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
        POA_Total = ['21686','19210'];
POA_TRF = ['12025','12025'];
POA_BS = ['1380','1380'];
POA_RB = ['6526','0'];
POA_O = ['1755','5805'];
TGA_0 = ['7594','7594'];
TGA_1_1000 = ['5723','5723'];
TGA_1001_2500 = ['6157','6157'];
TGA_2501_5000 = ['5553','5553'];
TGA_5001_7500 = ['3233','3233'];
TGA_7501_10000 = ['2530','2530'];
TGA_10001_12500 = ['2345','2345'];
TGA_12501_15000 = ['2299','2299'];
TGA_15001_20000 = ['2284','2284'];
TGA_20001_30000 = ['2277','2277'];
TGA_30001_40000 = ['2274','2274'];
TGA_40000 = ['0','0'];
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
                        if (dict['maritalStatus'].intValue * 1 > 0) {
                            // show options for student with children                            
                            if (div) { div.style.display = ''; }                            
                        }
                        else {
                            // hide options for student with children
                            var div = document.getElementById('divNumInFamilyWithChildren');
                            if (div) { div.style.display = 'none'; }                            
                        }
                        dict.isDependent = false;
                        if (dict['numberOfChildren'].intValue * 1 == 1) {
                            if (spanTwo) { spanTwo.style.display = 'none'; }
                            if (spanTwoOrMore) { spanTwoOrMore.style.display = ''; }
                            if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = ''; }
                            if (spanNumInFamilyHintWithChildren) { spanNumInFamilyHintWithChildren.style.display = ''; }
                            if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = 'none'; }
                        } else {
                            if (spanTwo) { spanTwo.style.display = ''; }
                            if (spanTwoOrMore) { spanTwoOrMore.style.display = 'none'; }
                            if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = 'none'; }
                            if (spanNumInFamilyHint) { spanNumInFamilyHint.style.display = ''; }
                            if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = ''; }
                        }
                        GoTo('4');

                    } else {
                        if (dict['numberOfChildren'].intValue * 1 > 0 || dict['maritalStatus'].intValue * 1 > 0) {                           
                            dict.isDependent = false;
                            if (dict['numberOfChildren'].intValue * 1 == 1) {
                                if (spanTwo) { spanTwo.style.display = 'none'; }
                                if (spanTwoOrMore) { spanTwoOrMore.style.display = ''; }
                                if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = ''; }
                                if (spanNumInFamilyHintWithChildren) { spanNumInFamilyHintWithChildren.style.display = ''; }
                                if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = 'none'; }
                            } else {
                                if (spanTwo) { spanTwo.style.display = ''; }
                                if (spanTwoOrMore) { spanTwoOrMore.style.display = 'none'; }
                                if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = 'none'; }
                                if (spanNumInFamilyHint) { spanNumInFamilyHint.style.display = ''; }
                                if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = ''; }
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
                imgInstitutionBanner.src = 'images/' + bannerFileName;
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
    </script>

    <center>
    <div id="divInstitutionBanner" style="display:none; style="margin:0;padding:0;padding-top:40px;font-family:Verdana;font-size:12px;color:#333333;background-color:#ffffff;line-height:17px;"">
        <img id="imgInstitutionBanner" src="npcalc/images/bannerplace.gif" alt="" title="" style="border:0px;" />
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="540px">
    <tr>
        <td align="left" valign="top" width="12px"><img src="npcalc/images/npc_tlc.gif" alt="" title="" /></td>
        <td align="left" valign="top" style="background:url(npcalc/images/npc_tb.gif) repeat-x;"><img src="npcalc/images/npc_tb.gif" alt="" title="" /></td>
        <td align="left" valign="top" width="12px"><img src="npcalc/images/npc_trc.gif" alt="" title="" /></td>
    </tr>
    <tr>
        <td align="left" valign="top" width="12px" style="background: url(npcalc/images/npc_lb.gif) repeat-y;"><img src="npcalc/images/npc_lb.gif" alt="" title="" /></td>
        <td align="left" valign="top" style="height:300px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td valign="top" align="left">
                    <div style="padding-left:14px;padding-top:11px;"><img src="npcalc/images/netpricecalculator.gif" alt="" title="" /></div>
                    <!-- dv_npc_s1_t -->
                    <div id="dv_npc_s1_t" style="padding-left:14px;padding-top:15px;display:none;">
                        <b>Step <span id="s_step1">1</span>:</b> Please provide the requested information. Your responses will be used to 
                        calculate an estimated amount that students like you paid - after grant aid and scholarships but before 
                        student loans - to attend this institution in a given year.
                    </div>
                    <!-- dv_npc_s2_t -->
                    <div id="dv_npc_s2_t" style="padding-left:14px;padding-top:15px;display:none;">
                        <b>Step <span id="s_step2"></span>:</b> Provide this information and then click Continue.
                    </div>
                    <!-- dv_npc_s3_t -->
                    <div id="dv_npc_s3_t" style="padding-left:14px;padding-top:15px;display:none;">
                        <b>Step <span id="s_step3"></span>:</b> Based on the information you provided in previous steps, your 
                        dependency status is estimated to be <b>Dependent</b>.  Provide this information and then click Continue.
                    </div>
                    <!-- dv_npc_s4_t -->
                    <div id="dv_npc_s4_t" style="padding-left:14px;padding-top:15px;display:none;">
                        <b>Step <span id="s_step4"></span>:</b> Based on the information you provided in previous steps, your 
                        dependency status is estimated to be <b>Independent</b>.  Provide this information and then click Continue.
                    </div>
                    <!-- summary header -->
                    <div id="dv_npc_s5_t" style="padding-left:14px;padding-top:15px;display:none;">
                        <span id="s_step5" style="display:none"></span>Review the information you have provided. You can click Modify to return to Step 1 and edit this information, 
                        or if you are happy with the current selections, click Continue to receive your <b>estimated</b> net price.
                    </div>
                    <!-- dv_npc_s6_t -->
                    <div id="dv_npc_s6_t" style="padding-left:14px;padding-top:15px;display:none;">
                        <span id="s_step6" style="display:none;"></span>                        
                        <div id="dv_npc_s6_academic" style="">Based on the information you have provided, the following calculations represent the average net price of attendance that students similar to you paid in the given year:</div>
                        <div id="dv_npc_s6_program" style="display:none;">Based on the information you have provided, the following calculations represent the average net price of attendance that students similar to you paid in the given year. This information applies only to the <span style="font-weight:bold; color:#cc6600;">##LARGESTPROGRAM##</span>&nbsp;program at the institution, which typically takes an average of <span style="font-weight:bold; color:#cc6600;">##NUMBEROFMONTHS##</span>&nbsp;months for a full-time student to complete. Prices may vary depending on the program of interest and its expected duration.</div>
                    </div>
                    <div style="padding-left:14px;padding-top:25px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="480px" style="table-layout:fixed;">
                        <tr>
                            <td align="left" valign="top" width="6px"><img src="npcalc/images/npcb_tlc.gif" alt="" title="" /></td>
                            <td align="left" valign="top" style="background-color:#e5eff7;"><img src="npcalc/images/npcb_tb.gif" alt="" title="" /></td>
                            <td align="left" valign="top" width="6px"><img src="npcalc/images/npcb_trc.gif" alt="" title="" /></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" colspan="3" style="background:url(npcalc/images/npcb_tmb.gif) repeat-x;height:239px;">
                                <!-- dv_npc_s0 -->
                                <div id="dv_npc_s0" style="padding-left:20px;padding-top:10px;padding-right:25px; line-height:17px;">
                                    <strong>Please read.</strong>
                                    By clicking below, I acknowledge that the estimate provided using this calculator does not represent 
                                    a final determination, or actual award, of financial assistance, or a final net price; it is an 
                                    estimate based on price of attendance and financial aid provided to students in a previous year. 
                                    Price of attendance and financial aid availability change year to year. The estimates shall 
                                    not be binding on the Secretary of Education, the institution of higher education, or the State. 
                                    Students must complete the Free Application for Federal Student Aid (FAFSA) in order to be eligible for, 
                                    and receive, an actual financial aid award that includes Federal grant, loan, or work-study assistance. 
                                    For more information on applying for Federal student aid, go to <a href="http://www.fafsa.ed.gov/" target="_blank">http://www.fafsa.ed.gov/</a>
                                    <div style="text-align:center; margin-top:30px;margin-bottom:25px;">
                                    
                                        <a href="JavaScript:GoNext()" onClick="_gaq.push(['_trackEvent', 'NPCalc', 'Step1', 'Start']);"><img src="npcalc/images/icon_iagree.gif" alt="I Agree" title="I Agree" style="border-width:0px;"/></a>                      
                                        
                                         <br />  <img id="imgJavaScriptNote" src="npcalc/images/javascript_note.gif" alt="You must have JavaScript enabled in your browser to use this site." title="You must have JavaScript enabled in your browser to use this site." />                 
                                    </div>
                                </div>
                                
                                <!-- dv_npc_s1 -->
                                <div id="dv_npc_s1" style="padding-left:20px;padding-top:15px;display:none;">
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
                                            <span id="s_ls_0"><input type="radio" name="rb_livingstatus" value="##rb_livingstatus_0##" title="On-campus (in a residence hall, dormitory, or on-campus apartment)" />On-campus (in a residence hall, dormitory, or &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;on-campus apartment)<br /></span>
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
                                        <td align="left" valign="top" style="padding-left:6px;padding-top:15px;">
                                            <a href="javascript:GoPrevious()" ><img src="npcalc/images/icon_previous.gif" border="0" alt="Previous" title="Previous" /></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:GoNext()" onClick="_gaq.push(['_trackEvent', 'NPCalc', 'Step2', 'Fin_Aid_Living']);"><img src="npcalc/images/icon_continue.gif" border="0" alt="Continue" title="Continue" /></a>
                                        </td>
                                    </tr>
                                    </table>
                                </div>
                                
                                <!-- dv_npc_s2 -->
                                <div id="dv_npc_s2" style="padding-left:20px;padding-top:15px;display:none;">
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
                                        <td align="left" valign="top" style="padding-left:6px;padding-top:15px;">
                                            <a href="javascript:GoPrevious()"><img src="npcalc/images/icon_previous.gif" border="0" alt="Previous" title="Previous" /></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:GoNext()" onClick="_gaq.push(['_trackEvent', 'NPCalc', 'Step3', 'Children']);"><img src="npcalc/images/icon_continue.gif" border="0" alt="Continue" title="Continue" /></a>
                                        </td>
                                    </tr>
                                    </table>
                                </div>
                                
                                <!-- dv_npc_s3 -->
                                <div id="dv_npc_s3" style="padding-left:20px;padding-top:15px;display:none;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable">
                                    <tr>
                                        <td align="left" valign="top" width="140px" style="padding-bottom:0px;"><span class="title1">Number in Family:</span></td>
                                        <td align="left" valign="top" style="padding-left:6px;padding-right:6px;padding-bottom:0px;">
                                            <span class="title2">How many people are in your family's household?</span><br />
                                            <span style="font-size:10px;line-height:14px;">(Count yourself, your parent(s), and your parents' other children who are under the age of 24.)</span>
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
                                            <span class="title2">What is your household income?</span><br />
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
                                        <td align="left" valign="top" style="padding-left:6px;padding-top:15px;">
                                            <a href="javascript:GoPrevious()"><img src="npcalc/images/icon_previous.gif" border="0" alt="Previous" title="Previous" /></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:GoNext()" onClick="_gaq.push(['_trackEvent', 'NPCalc', 'Step4', 'Income']);"><img src="npcalc/images/icon_continue.gif" border="0" alt="Continue" title="Continue" /></a>
                                        </td>
                                    </tr>
                                    </table>
                                </div>
                                
                                <!-- dv_npc_s4 -->
                                <div id="dv_npc_s4" style="padding-left:20px;padding-top:15px;display:none;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable">
                                    <tr>
                                        <td align="left" valign="top" width="140px" style="padding-bottom:0px;"><span class="title1">Number in Family:</span></td>
                                        <td align="left" valign="top" style="padding-right:6px;padding-left:6px;padding-bottom:0px;">
                                            <span class="title2">How many people are in your family's household?</span><br />
                                            <span id="spanNumInFamilyHint" style="display:none;font-size:10px;line-height:14px;">Count yourself and your spouse (if applicable). </span>
                                            <span id="spanNumInFamilyHintWithChildren" style="display:none;font-size:10px;line-height:14px;">Count yourself, your spouse (if applicable), and any children who are under the age of 24.</span>
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
                                            <span class="title2">What is your household income?</span><br />
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
                                        <td align="left" valign="top" style="padding-left:6px;">
                                            <a href="javascript:GoPrevious()"><img src="npcalc/images/icon_previous.gif" border="0" alt="Previous" title="Previous" /></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:GoNext()" onClick="_gaq.push(['_trackEvent', 'NPCalc', 'Step4', 'Income']);"><img src="npcalc/images/icon_continue.gif" border="0" alt="Continue" title="Continue" /></a>
                                        </td>
                                    </tr>
                                    </table>
                                </div>
                                
                                <!-- div with summary data -->
                                <div id="dv_npc_s5" style="padding-left:20px;padding-top:10px;padding-right:20px;display:none;">
                                    <div id="dv_summary" class="summarytable" style="margin:0px 0px 0px 0px; padding:0px 0px 0px 0px;"></div>
                                    <div style="text-align:center;margin-top:28px;margin-bottom:20px;">
                                        <a href="javascript:ClearVars();GoTo('1');"><img src="images/icon_modify.gif" border="0" alt="Modify" title="Modify" /></a>
                                            &nbsp;&nbsp;
                                        <a href="javascript:GoNext()" onClick="_gaq.push(['_trackEvent', 'NPCalc', 'Step5', 'Summary']);"><img src="images/icon_continue.gif" border="0" alt="Continue" title="Continue" /></a>
                                    </div>
                                </div>
                                
                                <!-- dv_npc_s5 -->
                                <div id="dv_npc_s6" style="padding-left:20px;padding-top:10px;padding-right:20px;display:none;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="formtable" style="font-size:11px;">
                                    <tr>
                                        <td colspan="2" align="left" valign="top" width="140px" style="padding-bottom:3px;border-bottom:1px solid #336699;">
                                            <span style="font-family:Verdana;font-size:13px;font-weight:bold;color:#336699;">Academic Year: 2009-10</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" width="285px" style="padding:7px;line-height:0px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle" width="285px" style="padding-bottom:7px;font-weight:bold;">Estimated total price of attendance:</td>
                                        <td align="left" valign="top" style="padding-bottom:7px;padding-left:6px;font-weight:bold"><span id="s_etpoa">$00,000</span></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle" width="285px" style="padding:3px;padding-top:0px;padding-left:35px;">a. Estimated tuition and fees</td>
                                        <td align="left" valign="top" style="padding:3px;padding-top:0px;padding-left:6px;"><span id="s_etf">$00,000</span></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle" width="285px" style="padding:3px;padding-left:35px;">b. Estimated room and board</td>
                                        <td align="left" valign="top" style="padding:3px;padding-left:6px;"><span id="s_erb">$00,000</span></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle" width="285px" style="padding:3px;padding-left:35px;">c. Estimated books and supplies</td>
                                        <td align="left" valign="top" style="padding:3px;padding-left:6px;"><span id="s_ebs">$00,000</span></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle" width="285px" style="padding:3px;padding-left:35px;">d. Estimated other expenses<br />&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10px;">(Personal expenses, transportation, etc.)</span></td>
                                        <td align="left" valign="top" style="padding:3px;padding-left:6px;"><span id="s_eo">$00,000</span></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle" width="285px" style="padding-top:15px;font-weight:bold;">Estimated total grant aid:<br /><span style="font-size:10px;font-weight:normal;">(Includes both merit and need based aid)</span></td>
                                        <td align="left" valign="top" style="padding-top:15px;padding-left:6px;font-weight:bold"><span id="s_etga">$00,000</span></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle" width="285px" style="padding-top:9px;font-size:13px;font-weight:bold;color:#336699;">Estimated net price:<br /><span style="font-size:10px;font-weight:normal;">(Price of attendance minus grant aid)</span></td>
                                        <td align="left" valign="top" style="padding-top:9px;padding-left:6px;font-size:13px;font-weight:bold;color:#336699;"><span id="s_enp">$00,000</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" width="285px">
                                            <span id="s_step6_body"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" style="padding-top:15px;">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="left" valign="top" width="140px" style="font-weight:bold;">&nbsp;</td>
                                                <td align="left" valign="top" style="padding-left:6px;">
                                                    <a href="javascript:GoPrevious()"><img src="npcalc/images/icon_previous.gif" border="0" alt="Previous" title="Previous" /></a>
                                                    &nbsp;&nbsp;
                                                    <a href="javascript:StartOver();"><img src="npcalc/images/icon_startover.gif" border="0" alt="Start Over" title="Start Over" /></a>
                                                </td>
                                            </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    </table>
                                    
                                </div>
                                <div id="dv_npc_s6_r" class="disclaimer" style="display:none;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;">                                    
                                    <tr>
                                        <td align="left" valign="top" width="5px">&nbsp;</td>
                                        <td align="left" valign="top" style="padding:1px;">
                                            <b>Please Note:</b> The estimates above apply to <b>full-time, first-time degree/certificate-seeking undergraduate students</b> only.&nbsp;
                                            
                                            <br /><br />
                                            These estimates do not represent a final determination, or actual award, of financial assistance or a final net 
                                            price; they are only estimates based on price of attendance and financial aid provided to students in 2009-10. 
                                            Price of attendance and financial aid availability change year to year. These estimates shall not be binding on 
                                            the Secretary of Education, the institution of higher education, or the State.<br /><br />
                                            
                                            Not all students receive financial aid. In 2009-10, 0% of our full-time students enrolling 
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
                        </tr>
                        </table>
                    </div>
                </td>
               
            </tr>
            </table>
        </td>
        <td align="left" valign="top" width="12px" style="background: url(npcalc/images/npc_rb.gif) repeat-y;"><img src="npcalc/images/npc_rb.gif" alt="" title="" /></td>
    </tr>
    <tr>
        <td align="left" valign="top" width="12px"><img src="npcalc/images/npc_blc.gif" alt="" title="" /></td>
        <td align="left" valign="top" style="background:url(npcalc/images/npc_bb.gif) repeat-x;"><img src="npcalc/images/npc_bb.gif" alt="" title="" /></td>
        <td align="left" valign="top" width="12px"><img src="npcalc/images/npc_brc.gif" alt="" title="" /></td>
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
} SetupConstants();</script>
