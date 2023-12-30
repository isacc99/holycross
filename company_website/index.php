<?php require_once('config.php'); ?>
<?php 
if(isset($_SESSION['msg_status'])){
   $msg_status = $_SESSION['msg_status'];
   unset($_SESSION['msg_status']);
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
   $data = '';
   foreach($_POST as $k => $v){
      if(!empty($data)) $data .= " , ";
      $data .= " `{$k}` = '{$v}' ";
   }
   $sql  = "INSERT INTO `messages` set {$data}";
   $save = $conn->query($sql);
   if($save){
      $msg_status = "success";
      foreach($_POST as $k => $v){
         unset($_POST[$k]);
      }
      $_SESSION['msg_status'] = $msg_status;
      header('location:'.$_SERVER['HTTP_REFERER']);
   }else{
      $msg_status = "failed";
      echo "<script>console.log('".$conn->error."')</script>";
      echo "<script>console.log('Query','".$sql."')</script>";
   }
}

?>
<?php 
$u_qry = $conn->query("SELECT * FROM users where id = 1");
foreach($u_qry->fetch_array() as $k => $v){
  if(!is_numeric($k)){
    $user[$k] = $v;
  }
}
$c_qry = $conn->query("SELECT * FROM churchtime");
while($row = $c_qry->fetch_assoc()){
    $churchtime[$row['meta_field']] = $row['meta_value'];
}


$d_qry = $conn->query("SELECT * FROM livecreds");
while($row = $d_qry->fetch_assoc()){
    $livecreds[$row['meta_field']] = $row['meta_value'];
}
$e_qry = $conn->query("SELECT * FROM contacts");
while($row = $e_qry->fetch_assoc()){
    $contacts[$row['meta_field']] = $row['meta_value'];
}


$result = $conn->query("SELECT weekday, event_name, time, STR_TO_DATE(date, '%d-%m-%Y') as date FROM calender ORDER BY date ASC");

// var_dump($contact['facebook']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-mQwYYMOvqJKdIKBzIep8qN7H5XD6FZyo+scNTjQF+5MIlUcGxZc0poYxjkj5JbIl" crossorigin="anonymous">

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CSI Holy Cross Church, Jalahalli</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TheEvent - v4.7.0
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 48px; /* Adjust the size of the play icon */
    color: #fff; /* Adjust the color of the play icon */
    cursor: pointer;
}
</style>
  <script type="text/javascript">

    var msg = new Array();
    var now = new Date();
    var start = new Date(now.getFullYear(), 0, 0);
    var diff = now - start;
    var oneDay = 1000 * 60 * 60 * 24;
    var today = Math.floor(diff / oneDay);

msg[1]="Greatly beloved, fear not peace be with you - Dan 10:19";
msg[2]="Light will shine on your ways - Job 22:28";
msg[3]="The Sun of righteousness shall rise with healing in its wings- Mal 4:2";
msg[4]="You will always be at the top, never at the bottom - Deut 28:13";
msg[5]="For the Lord your God is with you wherever you go -Joshua 1:9";
msg[6]="He will not forsake His saints - Ps 37:28";
msg[7]="He will watch over your life - Ps 121:7";
msg[8]="I will not forget you - Isaiah 49:15";
msg[9]="I am He who comforts you - Isaiah 51:12";
msg[10]="I will save your children - Isaiah 49:25";
msg[11]="Nothing shall by any means hurt you - Luke 10:19";
msg[12]="Open your mouth wide, and I will fill it - Ps 81:10";
msg[13]="I will put you incharge of many things - Mat 25:21";
msg[14]="Nothing will be impossible to you - Mat 17:20";
msg[15]="Your bones shall flourish like green and tender grass -Isaiah 66:14";
msg[16]="He will not fail you nor destroy you - Deut 4:31";
msg[17]="As one whom his mother comforts, so I comfort you -Isaiah 66:13";
msg[18]="I will multiply you exceedingly - Gen 17:2";
msg[19]="They shall invoke My name, I then will bless them - Num 6:27";
msg[20]="I will begin to exalt you in the sight of all - Joshua 3:7";
msg[21]="The Lord will do wonders among you - Joshua 3:5";
msg[22]="They will not overcome you, for I am with you - Jeremiah 1:19";
msg[23]="Lord will keep your foot from being caught - Prov 3:26";
msg[24]="I have chosen you - Hagg 2:23";
msg[25]="A new heart I will give you - Eze 36:26";
msg[26]="In righteousness you will be established - Isaiah 54:14";
msg[27]="They will call on My name, and I will answer them - Zech 13:9";
msg[28]="For I will surely save you .. because you have put your trust in Me - Jeremiah 39:18";
msg[29]="No evil shall come near thee - Ps 91:7";
msg[30]="I have loved you with an everlasting love -Jeremiah 31:3";
msg[31]="And your life will be brighter than the noon day - Job 11:17";
msg[32]="Your God has commanded your strength - Ps 68:28";
msg[33]="The Lord will take away from you all sickness - Deut 7:15";
msg[34]="Terror, for it will not come near you - Isaiah 54:14";
msg[35]="I will be an adversary to your adversaries - Exo 23:22";
msg[36]="I will burst your bonds - Jeremiah 30:8";
msg[37]="Thou shalt be as my mouth - Jeremiah 15:19";
msg[38]="As they pray, so shall I lead them - Jeremiah 31:9";
msg[39]="I will live among you - Zech 2:10";
msg[40]="I will visit you - Jeremiah 29:10";
msg[41]="There shall no evil touch thee - Job 5:19";
msg[42]="The days of your mourning shall be ended - Isaiah 60:20";
msg[43]="He will give you the desires of your heart - Ps 37:4";
msg[44]="Your Father who sees in secret will reward you - Mat 6:6";
msg[45]="May your God whom you serve continually deliver you -Dan 6:16";
msg[46]="You will seek those who quarrel with you, but will not find them - Isaiah 41:12";
msg[47]="I will restore health to you - Jeremiah 30:17";
msg[48]="You shall receive power when the Holy Spirit comes on you - Acts 1:8";
msg[49]="I have placed before you an open door that no one can shut - Rev 3:8";
msg[50]="The Lord your God will bless you in all your work and in all your undertakings - Deut 15:10";
msg[51]="I will not remember your sins - Isaiah 43:25";
msg[52]="Seek Me, that you may live - Amos 5:4";
msg[53]="If you believe, you will see the glory of God - John 11:40";
msg[54]="The least one shall become a thousand and the small one a strong nation - Isaiah 60:22";
msg[55]="My Grace is sufficient for you - II Cor 12:9";
msg[56]="Fear not... I have called you by your name, you are mine -Isaiah 43:1";
msg[57]="My spirit abides among you, fear not - Hagg 2:5";
msg[58]="According to your faith be it done to you - Mat 9:29";
msg[59]="No weapon that is formed against you shall prosper; - Isaiah 54:17";
msg[60]="He will be like a tree planted by the waters - Jeremiah 17:8";
msg[61]="I will lengthen your days - 1 Kings 3:14";
msg[62]="I will deliver you - Ps 50:15";
msg[63]="I will counsel you with My eye upon you - Ps 32:8";
msg[64]="For I satisfy the weary ones and refresh everyone who languishes - Jeremiah 31:25";
msg[65]="Instead of your shame, you shall have a double portion (of honour) - Isaiah 61:7";
msg[66]="Fear not, for I am with you - Gen 26:24";
msg[67]="Lord your God has been with you; you shall lack nothing -Deut 2:7";
msg[68]="May He grant you your heart's desire, and fulfil all your bplans - Ps 20:4";
msg[69]="I will heal your wounds - Jeremiah 30:17";
msg[70]="You shall not be given into the hand of men whom you dread - Jeremiah 39:17";
msg[71]="Surely I will bless you - Heb 6:14";
msg[72]="The Lord will go before you - Isaiah 52:12";
msg[73]="Tyranny will be far from you, you will have nothing to fear - Isaiah 54:14";
msg[74]="I will give you the holy and sure blessings - Acts 13:34";
msg[75]="I am your portion and your inheritance - Num 18:20";
msg[76]="You will certainly overtake them and succeed in the rescue - 1 Sam 30:8";
msg[77]="Go in peace - Mark 5:34";
msg[78]="I have determined to do good again, do not be afraid - Zech 8:15";
msg[79]="The hairs of your head are all numbered, fear not - Mat 10:30";
msg[80]="Fear not, only believe - Luke 8:50";
msg[81]="Do not fear, from now on you will be catching men - Luke 5:10";
msg[82]="Take courage, it is I; do not be afraid - Mat 14:27";
msg[83]="The Lord watches over all who love Him - Ps. 145:20";
msg[84]="Fear not, For I am your God - Isaiah 41:10";
msg[85]="The Lord shall preserve your going out and your coming in- Ps 121:8";
msg[86]="I will not leave you as orphans - John 14:18";
msg[87]="I will give you rest - Mat 11:28";
msg[88]="He who keePs Israel will neither slumber nor sleep - Ps 121:4";
msg[89]="I am making everything new - Rev 21:5";
msg[90]="Your healing shall spring forth speedily - Isaiah 58:8";
msg[91]="No one whose hope is in you will ever be put to shame -Ps 25:3";
msg[92]="As soon as He hears, He will answer you - Isaiah 30:19";
msg[93]="Blessed are you who weep now, for you shall laugh - Luke 6:21";
msg[94]="All your children shall be taught by the Lord - Isaiah 54:13";
msg[95]="Commit your work to the Lord, and your plans will be established - Prov 16:3";
msg[96]="See this great thing, the Lord is about to do before your eyes - 1 Sam 12:16";
msg[97]="I will give you a name and a praise - Zeph 3:20";
msg[98]="....All those who despised you, shall bow down at your feet- Isaiah 60:14";
msg[99]="Take courage, My son - Mat 9:2";
msg[100]="He will surely be gracious to you at the sound of your cry;- Isaiah 30:19";
msg[101]="I will rebuke the devourer for you, so that it may not destroy the fruits of your soil - Mal 3:11";
msg[102]="You shall serve the Lord your God, and I will bless your bread and your water - Exo 23:25";
msg[103]="....I will put a new spirit within you - Eze 36:26";
msg[104]="I will put My dwelling place among you and I will not abhor you - Lev 26:11";
msg[105]="I will make all My goodness pass before you - Exo 33:19";
msg[106]="Who satisfies your desires with good things so that youryouth is renewed like the eagle's - Ps 103:5";
msg[107]="No disaster will come near your tent - Ps 91:10";
msg[108]="You shall call and the Lord will answer; - Isaiah 58:9";
msg[109]="So will I save you. fear not, be strong - Zech 8:13";
msg[110]="Behold, I have put My words in your mouth - Jeremiah 1:9";
msg[111]="While they are yet speaking I will hear - Isaiah 65:24";
msg[112]="I will make you an eternal excellency, a joy from generation to generation - Isaiah 60:15";
msg[113]="Fear not, and be not dismayed for the battle is not yours,but God's - 2 Chro 20:15";
msg[114]="Kings shall see and arise, princes shall also bow down -Isaiah 49:7";
msg[115]="I will give you the treasures of darkness, and riches stored in secret places - Isaiah 45:3";
msg[116]="May the Lord make you increase, both you and your children - Ps 115:14";
msg[117]="I will make you ride upon the heights of the earth; - Isaiah 58:14";
msg[118]="I have heard your prayer, and seen your tears; I will heal you - 2 Kings 20:5";
msg[119]="May the Lord fulfill all your petitions - Ps 20:5";
msg[120]="Let not your heart be troubled - John 14:1";
msg[121]="The Lord shows saving strength of His right hand - Ps 20:6";
msg[122]="You will surely forget your misery - Job 11:16";
msg[123]="He will strengthen and protect you from the evil - 2 Thess 3:3";
msg[124]="He cares for you - I Peter 5:7";
msg[125]="Those who hope in the Lord will renew their strength -Isaiah 40:31";
msg[126]="Behold the Lord your God has set the land before you -Deut 1:21";
msg[127]="I will be a wall of fire around her - Zech 2:5";
msg[128]="Behold, a virgin shall conceive, and bear a son, and shall  call His name Immanuel - Isaiah 7:14";
msg[129]="But seek first His kingdom and His righteousness; and all these things shall be added to you - Mat 6:33";
msg[130]="Mary has chosen the good portion which shall not be taken away from her - Luke 10:42";
msg[131]="And the peace of God which passes all understanding will";
msg[132]="keep your hearts and your minds in Christ Jesus - Phil 4:7";
msg[133]="In the world you have tribulation, but take courage; I have overcome the world - John 16:33";
msg[134]="God of peace will be with you - Phil 4:9";
msg[135]="Behold! I am doing a new thing - Isaiah 43:19";
msg[136]="You surround them with your favor as with a shield - Ps 5:12";
msg[137]="Those who love your name may rejoice in You - Ps 5:11";
msg[138]="When the righteous cry for help, The Lord hears and delivers them out of their troubles - Ps 34:17";
msg[139]="Those who seek the Lord lack no good thing - Ps 34:10";
msg[140]="One who leads you in the way you should go - Isaiah 48:17";
msg[141]="He strengthens the bars of your gates - Ps 147:13";
msg[142]="He has blessed your children with you - Ps 147:13";
msg[143]="He makes peace in your borders - Ps 147:14";
msg[144]="He satisfies you with the finest of the wheat - Ps 147:14";
msg[145]="They still bring forth fruit in old age, they will stay fresh and green - Ps 92:14";
msg[146]="All my springs of joy are in You - Ps 87:7";
msg[147]="You shall come to your grave in ripe old age - Job 5:26";
msg[148]="He rises to show you compassion - Isaiah 30:18";
msg[149]="His tongue is like a consuming fire - Isaiah 30:27";
msg[150]="Your life is hid with Christ in God - Col 3:3";
msg[151]="My presence shall go with thee, and I will give you rest - Exo 33:14";
msg[152]="The Lord will fulfill His purpose for me - Ps 138:8";
msg[153]="The Lord your God will set you high above all the nations of the earth - Deut 28:1";
msg[154]="I will not leave you until I have done what I have promised you - Gen 28:15";
msg[155]="You will thresh the mountains and crush them - Isaiah 41:15";
msg[156]="I will make your oppressors eat their own flesh; - Isaiah 49:26";
msg[157]="He who touches you, touches the apple of His eye - Zech 2:8";
msg[158]="In quietness and trust is your strength - Isaiah 30:15";
msg[159]="Those who honour Me, I will honour - I Sam 2:30";
msg[160]="All the nations will call you blessed - Mal 3:12";
msg[161]="I will not take My mercy and steadfast love away from him- 1 Chron. 17:13";
msg[162]="She who was barren has borne seven children - 1 Sam 2:5";
msg[163]="The just shall live by his faith - Habak 2:4";
msg[164]="The works of His hands are truth and justice - Ps 111:7";
msg[165]="The hands of the diligent makes rich - Prov 10:4";
msg[166]="Because you have prayed to Me - I have heard you - 2 Kings 19:20";
msg[167]="He sent forth His word and healed them - Ps 107:20";
msg[168]="He is intimate with the upright - Prov 3:32";
msg[169]="Ask and it will be given to you - Mat 7:7";
msg[170]="Seek and you will find - Mat 7:7";
msg[171]="Knock and the door will be opened to you - Mat 7:7";
msg[172]="If you follow the Lord your God, it will be well - 1 Sam 12:14";
msg[173]="I am the good shepherd - John 10:11";
msg[174]="But if anyone loves God, he is known by Him - 1 Cor 8:3";
msg[175]="By your endurance you will gain your lives - Luke 21:19";
msg[176]="He who trusts in the Lord, loving kindness shall surround him - Ps 32:10";
msg[177]="I will show him My salvation - Ps 91:16";
msg[178]="He (Father) will give it to you in My name - John 16:23";
msg[179]="I will give you a place among these standing here - Zech 3:7";
msg[180]="You will pray to Him, and He will hear you - Job 22:27";
msg[181]="Then you will call upon Me and Come and pray to Me , and I will listen to you - Jeremiah 29:12";
msg[182]="You will seek Me and find Me when you seek Me with all your heart - Jeremiah 29:13";
msg[183]="Surely, He took our infirmities - Isaiah 53:4";
msg[184]="By His wounds we are healed - Isaiah 53:5";
msg[185]="He carried our sorrows - Isaiah 53:4";
msg[186]="He tends His flock like a shepherd - Isaiah 40:11";
msg[187]="He relents from sending calamity - Joel 2:13";
msg[188]="I am sending you grain, new wine and oil, enough to satisfy you fully - Joel 2:19";
msg[189]="Be not afraid, O land; be glad and rejoice - Joel 2:21";
msg[190]="He hath given you the former rain - Joel 2:23";
msg[191]="And you shall eat in plenty and be satisfied, and praise the name of the Lord, your God who has dealt wondrously with you - Joel 2:26";
msg[192]="I will restore to you the years that the locust has eaten, the canker worm and the caterpillar - Joel 2:25";
msg[193]="My people will never be put to shame - Joel 2:27";
msg[194]="I will pour out My spirit on all mankind - Joel 2:28";
msg[195]="Everyone who calls on the name of the Lord will be saved -Joel 2:32";
msg[196]="Your light break forth as the morning - Isaiah 58:8";
msg[197]="You will cry and He will say 'Here I am' - Isaiah 58:9";
msg[198]="Your light will rise in the darkness - Isaiah 58:10";
msg[199]="Your night will become like the noonday - Isaiah 58:10";
msg[200]="The Lord will guide you always; - Isaiah 58:11";
msg[201]="He satisfies your soul in drought, and makes fat thy bones -Isaiah 58:11";
msg[202]="You shall be like a watered garden and like a spring of water - Isaiah 58:11";
msg[203]="You prepare a table before me in the presence of my enemies - Ps 23:5";
msg[204]="He who does these things shall never be moved - Ps 15:5";
msg[205]="He will receive blessing from the Lord - Ps 24:5";
msg[206]="I will look well after you - Jeremiah 40:4";
msg[207]="Your fruitfulness comes from Me - Hosea 14:8";
msg[208]="His going forth is prepared as the morning - Hosea 6:3";
msg[209]="I will whistle for them to gather them together - Zech 10:8";
msg[210]="Blessed are the poor in spirit, for theirs is the kingdom of heaven - Mat 5:3";
msg[211]="Blessed are those who mourn, for they will be comforted - Mat 5:4";
msg[212]="Blessed are the meek, for they will inherit the earth - Mat 5:5";
msg[213]="Blessed are those who hunger and thirst for righteousness,for they will be satisfied - Mat 5:6";
msg[214]="Blessed are the merciful, for they will be shown mercy -Mat 5:7";
msg[215]="Blessed are the pure in heart for they will see God - Mat 5:8";
msg[216]="Blessed are the peacemakers, for they will be called the Children of God - Mat 5:9";
msg[217]="Blessed are those who are persecuted because of righteousness, for theirs is the kingdom of heaven - Mat 5:10";
msg[218]="The living God is among you - Joshua 3:10";
msg[219]="I will take away sickness from among you - Exo 23:25";
msg[220]="There shall be no one miscarrying or barren in your land -Exo 23:26";
msg[221]="I will give you a full life span - Exo 23:26";
msg[222]="I will send My terror ahead of you and throw into";
msg[223]="confusion every nation you encounter - Exo 23:27";
msg[224]="He holds victory in store for the upright - Prov 2:7";
msg[225]="I will strengthen them in the Lord - Zech 10:12";
msg[226]="Through your offspring all nations on earth will be blessed- Gen 22:18";
msg[227]="He will exalt you to inherit the land - Ps 37:34";
msg[228]="The righteous will flourish like a palm tree - Ps 92:12";
msg[229]="The plans of the Lord stand firm forever - Ps 33:11";
msg[230]="When you walk, your stePs will not be hampered when you run, you will not stumble - Prov 4:12";
msg[231]="He who redeems your life from the pit - Ps 103:4";
msg[232]="The sun shall not smite you by day, nor the moon by night- Ps 121:6";
msg[233]="Whoever follows Me will never walk in darkness, but will have the light of life - John 8:12";
msg[234]="Surely God is good to Israel to those who are pure in heart - Ps 73:1";
msg[235]="He makes my feet like the feet of a deer, He enables me to go on the heights - Habak 3:19";
msg[236]="The Lord gives strength to His people - Ps 29:11";
msg[237]="The Lord blesses His people with peace - Ps 29:11";
msg[238]="My dwelling place will be with them, I will be their God and they will be My people - Eze 37:27";
msg[239]="Cast the net on the right hand side of the boat and you will find a catch - John 21:6";
msg[240]="If you abide in My word then you are truly disciples of Mine and you shall know the truth - John 8:31";
msg[241]="The truth will set you free - John 8:32";
msg[242]="He saves those who are crushed in spirit - Ps 34:18";
msg[243]="The noble man makes noble plans, and by noble deeds he stands - Isaiah 32:8";
msg[244]="The beloved of the Lord rest secure in Him - Deut 33:12";
msg[245]="The one the Lord loves rests between His shoulders - Deut 33:12";
msg[246]="From this day on I will bless you - Haggai 2:19";
msg[247]="I will shake the heavens and the earth - Hagg 2:21";
msg[248]="I will overthrow the thrones of kingdoms - Hagg 2:22";
msg[249]="I will destroy strength of the kingdoms of the heathen - Hagg 2:22";
msg[250]="I will overthrow the chariots and their riders - Hagg 2:22";
msg[251]="Horses and their riders will fall each by the sword of another - Hagg 2:22";
msg[252]="I will make you like My signet ring - Hagg 2:23";
msg[253]="I will give you every place where you set your foot - Joshua 1:3";
msg[254]="No man will be able to stand before you all the days of your life - Joshua 1:5";
msg[255]="As I was with Moses, so I will be with you - Joshua 1:5";
msg[256]="I will never leave you nor forsake you be strong and courageous - Joshua 1:5";
msg[257]="He upholds your right hand - Isaiah 41:13";
msg[258]="I will give you a wise and discerning heart - 1 Kings 3:12";
msg[259]="For you shall eat the fruit of the labour of your hands - Ps 128:2";
msg[260]="Blessed, fortunate you shall be and it shall be well with you - Ps 128:2";
msg[261]="Your wife will be like a fruitful vine within your house - Ps 128:3";
msg[262]="Your children like olive plants around your table - Ps 128:3";
msg[263]="May the Lord bless you from Zion - Ps 128:5";
msg[264]="May you see the prosperity of Jerusalem all the days of your life - Ps 128:5";
msg[265]="May you see your children's children - Ps 128:6";
msg[266]="Peace be upon, Israel - Ps 128:6";
msg[267]="I will make you to this people a fortified, wall of bronze - Jeremiah 15:20";
msg[268]="I am with you, to deliver you and to save you - Jeremiah 15:20";
msg[269]="They will fight against you but will not overcome you - Jeremiah 15:20";
msg[270]="I will save you from the hands of the wicked - Jeremiah 15:21";
msg[271]="I will redeem you from the grasp of the cruel - Jeremiah 15:21";
msg[272]="Be still and know that I am your God - Ps 46:10";
msg[273]="Light is sown like seed for the righteous, and gladness for the upright in heart - Ps 97:11";
msg[274]="Abide in Me, and I in you - John 15:4";
msg[275]="He who abides in Me, and I in him, he bears much fruit - John 15:5";
msg[276]="If you remain in Me and My words remain in you, ask whatever you wish, and it will be given you - John 15:7";
msg[277]="When you bear much fruit, My Father is honoured and glorified; - John 15:8";
msg[278]="If you obey My commands you will remain in My love - John 15:10";
msg[279]="You are My friends if you do what I command - John 15:14";
msg[280]="You do not belong to the world, but I have chosen you out of the world - John 15:19";
msg[281]="Do not be afraid, O worm Jacob, O little Israel, for I Myself will help you - Isaiah 41:14";
msg[282]="I will make you into a threshing sledge, new and sharp - Isaiah 41:15";
msg[283]="You will reduce the hills to chaff - Isaiah 41:15";
msg[284]="I will make rivers flow on barren heights - Isaiah 41:18";
msg[285]="I will make springs within the valleys - Isaiah 41:18";
msg[286]="I will turn the desert into pools of water - Isaiah 41:18";
msg[287]="The wealth on the seas will be brought to you, to you the riches of the nations will come - Isaiah 60:5";
msg[288]="These commands are a lamp, this teaching is a light, and the corrections of disciple are the way to life - Prov 6:23";
msg[289]="Great peace have they who love your law, and nothing can make them stumble - Ps 119:165";
msg[290]="The prayer offered in faith will make the sick person well; the Lord will raise him up if he has sinned, he will be forgiven - James 5:15";
msg[291]="He who has the Son of God has life and he who does not have the Son of God does not have life - 1 John 5:12";
msg[292]="The sacrifices of God are a broken spirit; a broken and contrite heart, O God, you will not despise - Ps 51:17";
msg[293]="Come now, and let us reason together, says the Lord though your sins are like scarlet, they shall be as white as snow; though they are red as crimson, they shall be like wool - Isaiah 1:18";
msg[294]="Therefore, if anyone is in Christ, he is a new creation; the old has gone; the new has come - II Cor 5:17";
msg[295]="You are already clean because of the word I have spoken to you - John 15:3";
msg[296]="The eyes of the Lord are on the rigtheous and His ears are attentive to their cry - Ps 34:15";
msg[297]="I will make you into a great nation and I will bless you -Gen 12:2";
msg[298]="Who ever comes to Me I will never drive away - John 6:37";
msg[299]="I will make you most prosperous in all the work of your hands - Deut 30:9";
msg[300]="He gives grace to the humble - James 4:6";
msg[301]="The Lord delivers him in times of trouble - Ps 41:1";
msg[302]="To him whoever comes - I will give the right to sit with Me on My throne - Rev 3:21";
msg[303]="I will give you the crown of life - Rev 2:10";
msg[304]="He who tills his land will have plenty of food - Prov 28:19";
msg[305]="Stay awake and you will have food to spare - Prov 20:13";
msg[306]="He who has clean hands shall grow stronger and stronger - Job 17:9";
msg[307]="The fruit of righteousness will be peace; the effect of righteousness will be quietness and confidence forever -Isaiah 32:17";
msg[308]="The righteous will flourish like a green leaf - Prov. 11:28";
msg[309]="Be strong and do not be discouraged for there is reward for your work - 2 Chro. 15:7";
msg[310]="I will show them wonders - Micah 7:15";
msg[311]="The blameless are known to the Lord and the inheritance will endure forever - Ps 37:18";
msg[312]="The mind set on the flesh is death; for the mind set on the Spirit is life and peace - Rom 8:5";
msg[313]="He who pursues righteousness and loyalty find life,righteousness and honour - Prov 21:21";
msg[314]="Do not judge lest you be judged - Mat 7:1";
msg[315]="He who sows sparingly shall also reap sparingly and he who sows bountifully shall also reap bountifully - 2 Cor 9:6";
msg[316]="The wicked man flees though no one pursues - Prov 28:1";
msg[317]="The righteous are as bold as a lion - Prov 28:1";
msg[318]="The eyes of the blind will be opened - Isaiah 35:5";
msg[319]="The ears of the deaf will be unstopped - Isaiah 35:5";
msg[320]="The lame will leap like a deer - Isaiah 35:6";
msg[321]="The tongue of the dumb shall sing (for joy) - Isaiah 35:6";
msg[322]="Water will gush forth in the wilderness - Isaiah 35:6";
msg[323]="The burning sand will become like a pool - Isaiah 35:7";
msg[324]="The thirsty land will become bubbling springs - Isaiah 35:7";
msg[325]="Blessed are those who dwell in Your house; - Ps 84:4";
msg[326]="Blessed are those whose strength is in You - Ps 84:5";
msg[327]="Blessed are the people He chose for His inheritance - Ps 33:12";
msg[328]="Blessed is the nation whose God is the Lord - Ps 33:12";
msg[329]="Blessed is he whose transgression is forgiven - Ps 32:1";
msg[330]="Blessed is the man whose sin the Lord does not count";
msg[331]="against him and in whose spirit is no deceit - Ps 32:2";
msg[332]="Blessed is the man that endureth temptation - James 1:12";
msg[333]="Faith comes from hearing and hearing by the word of Christ - Rom 10:17";
msg[334]="The grass withers the flowers fades but the word of our God stands forever - Isaiah 40:8";
msg[335]="Blessed rather are those who hear the word of God and obey it - Luke 11:28";
msg[336]="Man does not live on bread alone, but on every word that comes from the mouth of God - Mat 4:4";
msg[337]="Heaven and earth will pass away, but my words will never pass away - Mat 24:35";
msg[338]="Everyone who hears these words of mine and puts them into practice is like a wise man who built his house on the rock - Mat 7:24";
msg[339]="I am the living bread that came down from heaven - John 6:51";
msg[340]="He who believes in Me, as the Scripture said, From his innermost being shall flow rivers of living water - John 7:38";
msg[341]="Behold, I will pour out My Spirit upon you - Prov 1:23";
msg[342]="He will give you another comforter, the Spirit of truth -John 14:16";
msg[343]="When the spirit of truth comes He will guide you into all truth - John 16:13";
msg[344]="God did not give us a spirit of timidity but a Spirit of power, of love and of self discipline - 2 Tim 1:7";
msg[345]="For the kingdom of God is... righteousness, peace and joy in the Holy Spirit - Rom 14:17";
msg[346]="How much more will your Father in heaven give the Holy Spirit, to those who ask Him - Luke 11:13";
msg[347]="As a father has compassion on his children, so the Lord has compassion on those who fear Him; - Ps 103:13";
msg[348]="How great is your goodness, which you have stored up for those who fear you - Ps 31:19";
msg[349]="For as the heaven is high above the Earth so great is His love (mercy) towards them that fear Him - Ps 103:11";
msg[350]="He provides food for those who fear him; He remembers His covenant forever - Ps 111:5";
msg[351]="He fulfills the desires of those who fear Him; - Ps 145:19";
msg[352]="Those who fear Him lack nothing - Ps 34:9";
msg[353]="The angel of the Lord encamps around those who fear Him and rescues them - Ps 34:7";
msg[354]="My sheep listen to My voice; I know them and they follow Me - John 10:27";
msg[355]="I know My sheep and My sheep know me - John 10:15";
msg[356]="I myself will search for My sheep and look after them - Eze 34:11";
msg[357]="I will tend them in a good pasture - Eze 34:14 ";
msg[358]="Guarding the paths of justice, and He preserves the way of His godly ones - Prov. 2:8";
msg[359]="He will guard the feet of His saints - I Sam. 2:9";
msg[360]="To execute upon them the judgement written and a two edged sword in their hand. This is an honour for all His godly ones - Psa 149:9,6";
msg[361]="Let the saints rejoice in this honour and sing for joy on their beds - Psa 149:5";
msg[362]="The dust will return to the earth as it was, and the spirit will return to God who gave it - Eccl 12:7";
msg[363]="Precious in the sight of the Lord is the death of His saints - Psa 116:15";
msg[364]="Just as man is destined to die once and after this comes judgement - Prov. 9:27";
msg[365]="For all who take up the sword shall perish by the sword - Mathew 26:52";
msg[366]="The unfolding of your words gives light; it gives understanding to the simple - Psa 119:130";
msg[367]="Little foolishness is weightier than wisdom and honor - Eccl 10:1";
msg[368]="If tha axe is dull and its edge unsharpened, more strength is needed but skill will bring success - Eccl. 10:10";
msg[369]="He who is spiritual appraises all things, yet he himself is appraised by no one - I Cor. 2:15";
msg[370]="The spirit of man is the lamp of the Lord; searching all the innermost parts of his being - Prov. 20:27";
msg[371]="Let those who love the Lord hate evil, for he guards the lives of his faithful ones - Psa 97:10";

    function writeMessage() {
    document.write(msg[today]);
    }

    </script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center ">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="index..php">The<span>Event</span></a></h1>
       <!--<a href="index..php" class="scrollto"><img src="assets/img/logo.png" alt="" title=""></a> -->
        
        <a href="index.php" class="scrollto"><img src=<?php echo validate_image($_settings->info('logo')) ?> alt="" title=""></a>
        <div id="texts" style="display:inline; white-space:nowrap; color: white; " >
              <b><?php echo $_settings->info('short_name') ?></b></div>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="./about.php">About</a></li>
          <li><a class="nav-link scrollto" href="#speakers">Fellowships</a></li>
          <li><a class="nav-link scrollto" href="#schedule">Calender</a></li>
          <li><a class="nav-link scrollto" href="#venue">Locate Us</a></li>
           <!-- <li><a class="nav-link scrollto" href="#hotels">Hotels</a></li>-->
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
        <!--   <li><a class="nav-link scrollto" href="#supporters">Sponsors</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
     <!-- <a class="buy-tickets scrollto" href="#buy-tickets">Buy Tickets</a>-->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->


  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <!--<h1 class="mb-4 pb-0">HITHERTO IN GRACE, HENCEFORTH IN FAITH</h1>-->
      <h1 class="mb-4 pb-0"> <?php echo $_settings->info('tagline') ?></h1>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12">
            <h3>Reflections from the Bible</h3>
            <h2 class="mb-1 pb-0"><script>
              writeMessage();
              </script></i></h2>
          </div>
          <div class="col-lg-3">
            <h3></h3>
            <p></p>
          </div>
          <div class="col-lg-3">
            <h3></h3>
            <p><br></p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
    <br><br>
    <section>
    <div class="container" data-aos="fade-up">
      <div class="section-header" data-aos="fade-up" data-aos-delay="200">
        <h2><?php echo $livecreds['heading'] ?></h2>
       <p> <a href=<?php echo $livecreds['youtube'] ?> target="_blank" class="about-btn scrollto">Live Stream</a></p>
       
     <!------------------------------------------------------->  
      
<section >
<?php
// Assuming $conn is the database connection variable

// Function to get video details from YouTube API (replace with actual API call)
function getVideoDetails($videoId) {
    // Implement your code to fetch video details from YouTube API
    // For simplicity, return a placeholder array here
    return array(
        'title' => 'Video Title',
        'thumbnail' => 'https://i.ytimg.com/vi/' . $videoId . '/mqdefault.jpg',
        'url' => 'https://www.youtube.com/watch?v=' . $videoId,
    );
}

// Fetch video IDs from the database
$youtubeVideoIds = array();
$resultplay = $conn->query("SELECT title FROM playlist");
if ($resultplay) {
    while ($row = $resultplay->fetch_assoc()) {
        $youtubeVideoIds[] = $row['title'];
    }
}

// Fetch video details for each video ID
$videos = array();
foreach ($youtubeVideoIds as $videoId) {
    $videos[] = getVideoDetails($videoId);
}
?>

<!-- Display the fetched video details -->

    </div>
</div>

<div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
            <?php foreach ($videos as $video): ?>
                <div class="swiper-slide">
                    <a href="<?= $video['url']; ?>" target="_blank" class="gallery-lightbox">
                        <!-- Add YouTube play icon here -->
                        <div class="play-icon">
                            <i class="fas fa-play-circle"></i>
                        </div>
                        <img src="<?= $video['thumbnail']; ?>" class="img-fluid" alt="">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
</section>
<section>
  <div class="section-header" data-aos="fade-up" data-aos-delay="200">
    <h2><?php echo $churchtime['heading'] ?></h2>
    <p> <?php echo $churchtime['message_line_1'] ?></p>
    <p> <?php echo $churchtime['message_line_2'] ?></p>
    <p>  <?php echo $churchtime['message_line_3'] ?></p>
   <br> <p><?php echo $churchtime['Sunday_Service'] ?></p>
    <p><?php echo $churchtime['Sunday_School'] ?></p>
    <p> <?php echo $churchtime['Communion'] ?></p>
    <p><?php echo $churchtime['Praise_&_worship'] ?></p>
  </div>
</section>
    <!-- ======= Speakers Section ======= -->
    <?php
$imageData1 = array();

$sql = "SELECT id, file_path, title, link_to_page FROM dp";
$resultdp = $conn->query($sql);

if ($resultdp->num_rows > 0) {
    while ($row = $resultdp->fetch_assoc()) {
        $imageData1[] = $row;
    }
}
?>

<section id="speakers">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>The Holy Cross Family</h2>
            <p>Read on to know more about the different fellowships in our church.</p>
        </div>

        <div class="row">
            <?php $count = 0; ?>
            <?php foreach ($imageData1 as $image): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="speaker" data-aos="fade-up" data-aos-delay="200">
                        <a href="<?php echo $image['link_to_page']; ?>"><img src="<?php echo $image['file_path']; ?>" alt="<?php echo $image['title']; ?>" class="img-fluid"></a>
                        <div class="details">
                            <h3><a href="<?php echo $image['link_to_page']; ?>"><?php echo $image['title']; ?></a></h3>
                            <p></p>
                            <div class="social">
                                <!-- Add your social icons here if needed -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php $count++; ?>
                <?php if ($count % 3 === 0): ?>
                    </div><div class="row">
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Speakers Section -->

 <!-- ======= Schedule Section ======= -->
    <section id="schedule" class="section-with-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Calender of EVENTS</h2>
          <p><?php echo $contacts['year'] ?></p>
        </div>
        <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
       
            
            <?php   if($result->num_rows>0){
  while ($row = $result->fetch_assoc()) {
    echo "<div class='row schedule-item'>" ;
  echo "<div class='col-md-2'><time>". $row["date"]."</time></div>";
  echo  "<div class='col-md-10'>";
  echo "<h4>".html_entity_decode(strip_tags($row["event_name"])). "</h4>";
  echo "<div>";
  echo "<p>".$row["weekday"]. "</p></div>";
  echo "<p>".$row["time"]. "</p></div></div>";
}} ?>

          <!-- End Schdule Day 1 -->
</div>
          <!-- Schdule Day 2
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">

            <div class="row schedule-item">
              <div class="row schedule-item">
              </div>
                <div class="col-md-2"><time>2/7/2023</time></div>
                <div class="col-md-10">

                  <h4>Stewardship Sunday </h4>
                  <div>
                  <p>Sunday</p>
                  </div>
                  <p>09:00 AM</p>
                </div>
              </div>

              <div class="row schedule-item">
                <div class="col-md-2"><time>9/7/2023</time></div>
                <div class="col-md-10">

                  <h4>Theological Education Sunday  </h4>
                  <div>
                  <p>Mission Sunday</p>
                  </div>
                  <p>09:00 AM</p>
                </div>
              </div>

              <div class="row schedule-item">
                <div class="col-md-2"><time>6/8/2023</time></div>
                <div class="col-md-10">

                  <h4>Mission Sunday </h4>
                  <div>
                  <p>Sunday</p>
                  </div>
                  <p>09:00 AM</p>
                </div>
              </div>


            <div class="row schedule-item">
              <div class="col-md-2"><time>3/9/2023</time></div>
              <div class="col-md-10">

                <h4>Thanksgiving Sunday /
                  Harvest Festival  </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>08:00 AM</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>10/9/2023</time></div>
              <div class="col-md-10">

                <h4>Education Sunday</h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>17/9/2023</time></div>
              <div class="col-md-10">

                <h4>Women’s Sunday </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>24/9/2023</time></div>
              <div class="col-md-10">

                <h4>Senior Citizens’ Sunday  </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>1/10/2023</time></div>
              <div class="col-md-10">

                <h4>Laity Sunday </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>8/10/2023</time></div>
              <div class="col-md-10">

                <h4>Youth Sunday</h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>15/10/2023</time></div>
              <div class="col-md-10">

                <h4>Sunday for the Mentally &
                  Physically Challenged </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>22/10/2023</time></div>
              <div class="col-md-10">

                <h4>Men’s Sunday</h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>29/10/2023</time></div>
              <div class="col-md-10">

                <h4>Reformation Sunday </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>1/11/2023</time></div>
              <div class="col-md-10">

                <h4>Annual Family Retreat  </h4>
                <div>
                <p>Wednesday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>5/11/2023</time></div>
              <div class="col-md-10">

                <h4>Sunday School Sunday</h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>12/11/2023</time></div>
              <div class="col-md-10">

                <h4>Unity Sunday  </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>19/11/2023</time></div>
              <div class="col-md-10">

                <h4>Church Anniversary/
                  Sunday for the Girl Child </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>3/12/2023</time></div>
              <div class="col-md-10">

                <h4>Advent Sunday </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>10/12/2023</time></div>
              <div class="col-md-10">

                <h4>Bible Sunday / Christmas Carol
                  Program (MF, WF, YF & Choir)</h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>10/12/2023 - 17/12/2023</time></div>
              <div class="col-md-10">

                <h4>Christmas Carol Rounds </h4>
                <div>
                <p>Sunday - Sunday</p>
                </div>
                <p>06:00 PM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>17/12/2023</time></div>
              <div class="col-md-10">

                <h4>Christmas Tree / Carol Service </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>07:00 PM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>25/12/2023</time></div>
              <div class="col-md-10">

                <h4>Christmas Service </h4>
                <div>
                <p>Monday</p>
                </div>
                <p>07:00 AM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>30/12/2023</time></div>
              <div class="col-md-10">

                <h4>Parish Dinner </h4>
                <div>
                <p>Saturday</p>
                </div>
                <p>06:00 PM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>31/12/2023</time></div>
              <div class="col-md-10">

                <h4>Family Sunday </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>31/12/2023</time></div>
              <div class="col-md-10">

                <h4>Watch Night Service </h4>
                <div>
                <p>Sunday</p>
                </div>
                <p>11:30 PM</p>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>1/1/2024</time></div>
              <div class="col-md-10">

                <h4>New Year Service </h4>
                <div>
                <p>Monday</p>
                </div>
                <p>09:00 AM</p>
              </div>
            </div>


          </div> -->
          <!-- End Schdule Day 2 --> 
          <br>
          <br>
          <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
            <br>
          <br>
            <li class="nav-item">
              <a class="nav-link active" href="#day-1" role="tab" data-bs-toggle="tab">Previous</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#day-2" role="tab" data-bs-toggle="tab">Next</a>
            </li>
          </ul>

    </section><!-- End Schedule Section -->

    <!-- ======= Venue Section ======= -->
    <section id="venue">

      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Locate Us</h2>
          <p><?php echo $contacts['address'] ?></p>
        </div>
        <div class="container-fluid venue-gallery-container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/1.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/all.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/2.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/Alter.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/3.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/alter2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/4.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/Church.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/5.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/front.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/6.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/People.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/7.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/view.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/8.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/walkthrough.jpg" alt="" class="img-fluid">

              </a>
            </div>
          </div>
        <div class="row g-0">
          <div class="col-lg-12 venue-map">
            <iframe src=<?php echo $contacts['gmap'] ?> frameborder="0" style="border:0" allowfullscreen></iframe>

          </div>


        </div>

      </div>

      

        </div>
      </div>

    </section>



    <?php

$imageData = array();


$sql = "SELECT id, file_path FROM gallery";
$resultgal = $conn->query($sql);

if ($resultgal->num_rows > 0) {
    while ($row = $resultgal->fetch_assoc()) {
        $imageData[] = $row;
    }
}
?>



<section id="gallery">

  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Gallery</h2>
     
      <p><a href="https://drive.google.com/drive/folders/1AcvDi2HVCMTsm3aSSHpL-SJRpE5YHFPV?usp=sharing" target = "_blank">Click here</a> for more images</p>
    </div>
  </div>

  <div class="gallery-slider swiper">
    <div class="swiper-wrapper align-items-center">
      <?php foreach ($imageData as $image): ?>
        <div class="swiper-slide">
          <a href="<?php echo $image['file_path']; ?>" class="gallery-lightbox">
            <img src="<?php echo $image['file_path']; ?>" class="img-fluid" alt="">
          </a>
        </div>
      <?php endforeach; ?> 
    </div>
    <div class="swiper-pagination"></div>
  </div>

</section>
    <section id="venue">

      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
    <div class="col-lg-12 venue-info">
      <div class="row justify-content-center">
        <div class="col-11 col-lg-8 position-relative">
          <h3>General Enquiries and Prayer Requests</h3>

          <a class="buy-tickets scrollto" href="https://docs.google.com/forms/d/e/1FAIpQLSchIbx8iDWEgVxs6RAcJgNDGrNo7CHRLvnFKtKDc0LimN_KCg/viewform" target="_blank">Ask!</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>

<section id="supporters" class="section-with-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Pastorate committee</h2>
      <p>2022-2025</p>
    </div>

    <style>
      .person-box {
        width: 350px;
        text-align: center;
        margin: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      .person-box img {
        max-width: 100%;
        height: auto;
        border-radius: 50%;
        width: 150px; /* Set a fixed width for the circular image */
        height: 150px; /* Set a fixed height for the circular image */
        object-fit: cover; /* Maintain the aspect ratio and cover the container */
      }
    </style>

    <div>
      <div class="row no-gutters supporters-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">
        <?php
        // Your existing PHP code to fetch data
        $file_qry = $conn->query("SELECT id, title, description, file_path, date_created, date_updated FROM pastoratecommittee");

        while ($file_row = $file_qry->fetch_assoc()) {
          // Access the data using the column names
          $file_title = $file_row['title'];
          $file_path = $file_row['file_path'];
          $file_description = html_entity_decode(strip_tags($file_row['description']));
        ?>

          <div class="person-box">
            <img src="<?php echo $file_path; ?>" alt="<?php echo $file_title; ?>">
            <h3><?php echo $file_title; ?></h3>
            <h5><?php echo $file_description; ?></h5>
          </div>

        <?php
        } // End of while loop
        ?>
      </div>
    </div>
  </div>
</section>



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Find us On Social</h2>
          <p></p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-instagram"></i>

              <p><a href=" <?php echo $contacts['instagram'] ?>" target="_blank">CSI Holy Cross Church</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-facebook"></i>

              <p><a href=" <?php echo $contacts['facebook'] ?>" target="_blank">CSI Holy Cross Church</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-youtube"></i>

              <p><a href=" <?php echo $contacts['youtube'] ?>" target="_blank">CSI Holy Cross Church</a></p>
            </div>
          </div>

        </div>


      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="assets/img/logo.png" alt="TheEvenet">
            <p>Keep us, the Holy Cross family in your prayers. God Bless You!!</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="men.php">Men's Fellowship</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="women.php">Women's Fellowship</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="youth.php">Youth Fellowship</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="sundayschool.php">Sunday School</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="preSchool.php">Pre School</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          <h4>Service Timing</h4>

          <br> <p><?php echo $churchtime['Sunday_Service'] ?></p>
    <p><?php echo $churchtime['Sunday_School'] ?></p>
    <p> <?php echo $churchtime['Communion'] ?></p>
    <p><?php echo $churchtime['Praise_&_worship'] ?></p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              <?php echo $contacts['address'] ?> <br>
            <strong>Phone:</strong>  <?php echo $contacts['mobile'] ?><br>
            <strong>Email:</strong>  <?php echo $contacts['email'] ?><br>
          </p>


            </p>

            <div class="social-links">
              
              <a href="https://www.facebook.com/p/CSI-Holy-Cross-Church-100069608255007/" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href=" <?php echo $contacts['instagram'] ?>" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href=" <?php echo $contacts['youtube'] ?>" class="google-plus"><i class="bi bi-youtube"></i></a>
             
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
       <strong></strong>
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent

        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>