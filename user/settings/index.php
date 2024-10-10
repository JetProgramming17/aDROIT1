<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>settings</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar">
    <div class="navdiv">
        <div class="logo"><a href="#">ADROIT</a></div>
        
        <div class="nav-items">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="bills.php">Bills</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="settings.php"><i class="fas fa-cog"></i> </a></li>

            </ul>
        </div>

        <div class="logout-btn">
            <button><a href="logout.php">Logout</a></button>
        </div>
    </div>
</nav>
<main>
  <h1>Settings</h1>

  <div class="group-setting" id="search-settings">
    <div class="group-con">
      <span class="icon"><img src="https://cdn-icons-png.flaticon.com/256/54/54481.png" alt="search" /></span><search><input type="search" list="searchList" placeholder="Search settings"/></search>
    </div>
  </div>
  <div class="group" id="connections">
    <!--system connections for meter readings-->
    <div class="group-con">
      <span class="icon"><img src="https://cdn-icons-png.flaticon.com/128/659/659998.png" alt="connected" /></span>   
      <div class="contents">
        <div onclick="openForm()" class="contents-title">Connected devices</div>
        <div class="contents-sub">Bluetooth, USB</div>
      </div>
    </div>

  </div>
  <div class="group" id="visual">
    <!--appearance-->
    <div class="group-con">   
       <span class="icon"><img src="https://cdn-icons-png.flaticon.com/128/2633/2633329.png" alt="display" /></span>      
       <div class="contents">   
        <div onclick="openForm()" class="contents-title">Display</div>   
         <div class="contents-sub">Theme, font size, brightness</div>   
       </div>   
     </div>   
    <div class="group-con">  
        <span class="icon"><img src="https://cdn-icons-png.flaticon.com/256/739/739249.png" alt="wallpaper" /></span>     
        <div class="contents">  
          <div onclick="openForm()" class="contents-title">Wallpaper</div>  
          <div class="contents-sub">Home, lock screen, screensaver</div>  
        </div>  
     </div>  
    <div class="group-con">     
         <span class="icon"><img src="https://cdn-icons-png.flaticon.com/256/4603/4603384.png" alt="gesture" /></span>        
         <div class="contents">     
          <div onclick="openForm()" class="contents-title">Gestures</div>     
           <div class="contents-sub">Use gestures and keys to quickly open frequently used functions</div>     
         </div>     
      </div>     
    <div class="group-con">    
          <span class="icon"><img src="https://cdn-icons-png.flaticon.com/128/2645/2645897.png" alt="notification" /></span>       
          <div class="contents">    
            <div onclick="openForm()" class="contents-title">Notifications</div>    
            <div class="contents-sub">History, alerts</div>    
          </div>    
       </div>   
    <div class="group-con">    
        <span class="icon"><img src="night-mode.png" alt="notification" /></span>       
        <div class="contents">    
          <div onclick="openForm()" class="contents-title">Appearance</div>    
          <div class="contents-sub">Dark mode</div>    
        </div>    
     </div>   
  </div>
  <div class="group" id="security">
    <div class="group-con">       
           <span class="icon"><img src="insurance.png" alt="battery" /></span>          
           <div class="contents">       
            <div onclick="openForm()" class="contents-title">Privacy and security</div>       
             <div class="contents-sub">Cookies</div>    
           </div>       
        </div>       
    <div class="group-con">      
            <span class="icon"><img src="terms-and-conditions.png" alt="storage" /></span>         
            <div class="contents">      
              <div onclick="openForm()" class="contents-title">Ts and Cs</div>      
              <div class="contents-sub">As Techcraft we are committed to...</div>   
            </div>      
         </div>      
  </div>
</main>

 <!--pop-up-->
<div class="form-popup" id="settings-list">
        <div class="c-panel__content">
          <div class="o-container">
            <h2 class="c-heading-bravo u-text-center">Connected Devices</h2>
           <div class="o-layout o-layout--narrow o-devices o-devices--is-visible">
              <div class="o-layout__item u-width-1/2@medium o-device">
                <div class="c-device">
                  <div class="c-device__icon c-device__error">
                    <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Step-1---Connected-Devices" transform="translate(-814.000000, -2238.000000)" fill="#1CB334">
                          <g id="Page" transform="translate(-11.000000, 0.000000)">
                            <path d="M840.762463,2238 C832.056658,2238 825,2245.06666 825,2253.78481 C825,2262.50296 832.056658,2269.56962 840.762463,2269.56962 C849.468269,2269.56962 856.524927,2262.50296 856.524927,2253.78481 C856.524927,2245.06666 849.468269,2238 840.762463,2238 M840.762463,2239.9731 C848.367852,2239.9731 854.554619,2246.16864 854.554619,2253.78481 C854.554619,2261.40098 848.367852,2267.59652 840.762463,2267.59652 C833.157075,2267.59652 826.970308,2261.40098 826.970308,2253.78481 C826.970308,2246.16864 833.157075,2239.9731 840.762463,2239.9731 M846.304348,2252.0987 L845.806846,2251.58569 C844.517279,2250.3456 842.686863,2249.62837 840.787486,2249.61949 L840.711629,2249.61949 C838.833926,2249.64021 837.022228,2250.35941 835.737587,2251.59654 L835.244025,2252.10462 C835.060786,2252.30291 834.969167,2252.55054 834.9869,2252.80112 C835.006603,2253.07933 835.161272,2253.32695 835.445981,2253.53511 C835.518883,2253.58839 835.592769,2253.6387 835.669611,2253.6831 C835.765171,2253.73933 835.844969,2253.77978 835.899152,2253.80346 L836.472512,2254.04713 L836.530636,2253.98301 L836.533591,2253.98498 L837.254724,2253.21942 C838.120674,2252.23681 839.370835,2251.69322 840.774679,2251.68928 C842.181479,2251.69322 843.440506,2252.24273 844.320248,2253.24112 L844.928088,2253.88139 L845.080787,2254.04713 L845.648236,2253.80444 C845.709315,2253.77978 845.789113,2253.73933 845.879747,2253.68408 C845.96053,2253.6387 846.033431,2253.58937 846.109288,2253.53511 C846.393997,2253.32498 846.547681,2253.07834 846.566399,2252.80112 C846.584132,2252.55152 846.492513,2252.30291 846.304348,2252.0987 M849.440685,2248.84545 L849.201292,2248.59585 L848.624977,2248.00589 C846.674372,2246.1275 843.893283,2244.95055 840.804825,2244.93673 L840.804825,2244.93377 C840.794973,2244.93377 840.786107,2244.93476 840.777241,2244.93575 C840.767389,2244.93476 840.758523,2244.93377 840.749656,2244.93377 L840.749656,2244.93673 C837.660214,2244.95055 834.879124,2246.1275 832.929504,2248.00589 L832.352204,2248.59585 L832.112812,2248.84545 C831.937454,2249.03684 831.852731,2249.26473 831.869479,2249.5015 C831.887211,2249.76097 832.040895,2249.99281 832.340382,2250.21182 C832.439883,2250.28482 832.540368,2250.35191 832.650706,2250.41801 C832.766954,2250.48707 832.863499,2250.53639 832.935415,2250.56698 L833.317655,2250.72976 L833.552122,2250.47424 L833.556062,2250.4772 L833.897911,2250.10133 L834.21316,2249.79451 C835.763792,2248.03549 838.079889,2246.95127 840.777241,2246.94338 C843.474592,2246.95127 845.789704,2248.03549 847.341321,2249.79451 L847.655586,2250.10133 L847.997434,2250.4772 L848.00236,2250.47424 L848.236826,2250.72976 L848.619066,2250.56698 C848.690982,2250.53639 848.787527,2250.48707 848.902791,2250.41801 C849.013128,2250.35191 849.114599,2250.28482 849.214099,2250.21182 C849.512601,2249.99281 849.66727,2249.76097 849.685003,2249.5015 C849.70175,2249.26473 849.617027,2249.03684 849.440685,2248.84545 M840.773004,2257.89281 C840.031184,2257.95003 839.055881,2257.18841 839.083465,2256.1476 C839.110065,2255.1502 839.908039,2254.43791 840.807485,2254.44284 C841.788698,2254.44876 842.533475,2255.22912 842.530519,2256.1989 C842.528549,2257.12034 841.714812,2257.9303 840.773004,2257.89281" id="WiFi-icon"></path>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <div class="c-device__name">
                    Lethabo's Macbook Air
                  </div>
                </div>
              </div>
              <div class="o-layout__item u-width-1/2@medium o-device">
                <div class="c-device">
                   <div class="c-device__icon">
                    <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Step-1---Connected-Devices" transform="translate(-814.000000, -2238.000000)" fill="#1CB334">
                          <g id="Page" transform="translate(-11.000000, 0.000000)">
                            <path d="M840.762463,2238 C832.056658,2238 825,2245.06666 825,2253.78481 C825,2262.50296 832.056658,2269.56962 840.762463,2269.56962 C849.468269,2269.56962 856.524927,2262.50296 856.524927,2253.78481 C856.524927,2245.06666 849.468269,2238 840.762463,2238 M840.762463,2239.9731 C848.367852,2239.9731 854.554619,2246.16864 854.554619,2253.78481 C854.554619,2261.40098 848.367852,2267.59652 840.762463,2267.59652 C833.157075,2267.59652 826.970308,2261.40098 826.970308,2253.78481 C826.970308,2246.16864 833.157075,2239.9731 840.762463,2239.9731 M846.304348,2252.0987 L845.806846,2251.58569 C844.517279,2250.3456 842.686863,2249.62837 840.787486,2249.61949 L840.711629,2249.61949 C838.833926,2249.64021 837.022228,2250.35941 835.737587,2251.59654 L835.244025,2252.10462 C835.060786,2252.30291 834.969167,2252.55054 834.9869,2252.80112 C835.006603,2253.07933 835.161272,2253.32695 835.445981,2253.53511 C835.518883,2253.58839 835.592769,2253.6387 835.669611,2253.6831 C835.765171,2253.73933 835.844969,2253.77978 835.899152,2253.80346 L836.472512,2254.04713 L836.530636,2253.98301 L836.533591,2253.98498 L837.254724,2253.21942 C838.120674,2252.23681 839.370835,2251.69322 840.774679,2251.68928 C842.181479,2251.69322 843.440506,2252.24273 844.320248,2253.24112 L844.928088,2253.88139 L845.080787,2254.04713 L845.648236,2253.80444 C845.709315,2253.77978 845.789113,2253.73933 845.879747,2253.68408 C845.96053,2253.6387 846.033431,2253.58937 846.109288,2253.53511 C846.393997,2253.32498 846.547681,2253.07834 846.566399,2252.80112 C846.584132,2252.55152 846.492513,2252.30291 846.304348,2252.0987 M849.440685,2248.84545 L849.201292,2248.59585 L848.624977,2248.00589 C846.674372,2246.1275 843.893283,2244.95055 840.804825,2244.93673 L840.804825,2244.93377 C840.794973,2244.93377 840.786107,2244.93476 840.777241,2244.93575 C840.767389,2244.93476 840.758523,2244.93377 840.749656,2244.93377 L840.749656,2244.93673 C837.660214,2244.95055 834.879124,2246.1275 832.929504,2248.00589 L832.352204,2248.59585 L832.112812,2248.84545 C831.937454,2249.03684 831.852731,2249.26473 831.869479,2249.5015 C831.887211,2249.76097 832.040895,2249.99281 832.340382,2250.21182 C832.439883,2250.28482 832.540368,2250.35191 832.650706,2250.41801 C832.766954,2250.48707 832.863499,2250.53639 832.935415,2250.56698 L833.317655,2250.72976 L833.552122,2250.47424 L833.556062,2250.4772 L833.897911,2250.10133 L834.21316,2249.79451 C835.763792,2248.03549 838.079889,2246.95127 840.777241,2246.94338 C843.474592,2246.95127 845.789704,2248.03549 847.341321,2249.79451 L847.655586,2250.10133 L847.997434,2250.4772 L848.00236,2250.47424 L848.236826,2250.72976 L848.619066,2250.56698 C848.690982,2250.53639 848.787527,2250.48707 848.902791,2250.41801 C849.013128,2250.35191 849.114599,2250.28482 849.214099,2250.21182 C849.512601,2249.99281 849.66727,2249.76097 849.685003,2249.5015 C849.70175,2249.26473 849.617027,2249.03684 849.440685,2248.84545 M840.773004,2257.89281 C840.031184,2257.95003 839.055881,2257.18841 839.083465,2256.1476 C839.110065,2255.1502 839.908039,2254.43791 840.807485,2254.44284 C841.788698,2254.44876 842.533475,2255.22912 842.530519,2256.1989 C842.528549,2257.12034 841.714812,2257.9303 840.773004,2257.89281" id="WiFi-icon"></path>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <div class="c-device__name">
                    Lethabo's Iphone
                  </div>
                </div>
              </div>
              <div class="o-layout__item u-width-1/2@medium o-device">
                <div class="c-device">
                   <div class="c-device__icon">
                    <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Step-1---Connected-Devices" transform="translate(-814.000000, -2238.000000)" fill="#1CB334">
                          <g id="Page" transform="translate(-11.000000, 0.000000)">
                            <path d="M840.762463,2238 C832.056658,2238 825,2245.06666 825,2253.78481 C825,2262.50296 832.056658,2269.56962 840.762463,2269.56962 C849.468269,2269.56962 856.524927,2262.50296 856.524927,2253.78481 C856.524927,2245.06666 849.468269,2238 840.762463,2238 M840.762463,2239.9731 C848.367852,2239.9731 854.554619,2246.16864 854.554619,2253.78481 C854.554619,2261.40098 848.367852,2267.59652 840.762463,2267.59652 C833.157075,2267.59652 826.970308,2261.40098 826.970308,2253.78481 C826.970308,2246.16864 833.157075,2239.9731 840.762463,2239.9731 M846.304348,2252.0987 L845.806846,2251.58569 C844.517279,2250.3456 842.686863,2249.62837 840.787486,2249.61949 L840.711629,2249.61949 C838.833926,2249.64021 837.022228,2250.35941 835.737587,2251.59654 L835.244025,2252.10462 C835.060786,2252.30291 834.969167,2252.55054 834.9869,2252.80112 C835.006603,2253.07933 835.161272,2253.32695 835.445981,2253.53511 C835.518883,2253.58839 835.592769,2253.6387 835.669611,2253.6831 C835.765171,2253.73933 835.844969,2253.77978 835.899152,2253.80346 L836.472512,2254.04713 L836.530636,2253.98301 L836.533591,2253.98498 L837.254724,2253.21942 C838.120674,2252.23681 839.370835,2251.69322 840.774679,2251.68928 C842.181479,2251.69322 843.440506,2252.24273 844.320248,2253.24112 L844.928088,2253.88139 L845.080787,2254.04713 L845.648236,2253.80444 C845.709315,2253.77978 845.789113,2253.73933 845.879747,2253.68408 C845.96053,2253.6387 846.033431,2253.58937 846.109288,2253.53511 C846.393997,2253.32498 846.547681,2253.07834 846.566399,2252.80112 C846.584132,2252.55152 846.492513,2252.30291 846.304348,2252.0987 M849.440685,2248.84545 L849.201292,2248.59585 L848.624977,2248.00589 C846.674372,2246.1275 843.893283,2244.95055 840.804825,2244.93673 L840.804825,2244.93377 C840.794973,2244.93377 840.786107,2244.93476 840.777241,2244.93575 C840.767389,2244.93476 840.758523,2244.93377 840.749656,2244.93377 L840.749656,2244.93673 C837.660214,2244.95055 834.879124,2246.1275 832.929504,2248.00589 L832.352204,2248.59585 L832.112812,2248.84545 C831.937454,2249.03684 831.852731,2249.26473 831.869479,2249.5015 C831.887211,2249.76097 832.040895,2249.99281 832.340382,2250.21182 C832.439883,2250.28482 832.540368,2250.35191 832.650706,2250.41801 C832.766954,2250.48707 832.863499,2250.53639 832.935415,2250.56698 L833.317655,2250.72976 L833.552122,2250.47424 L833.556062,2250.4772 L833.897911,2250.10133 L834.21316,2249.79451 C835.763792,2248.03549 838.079889,2246.95127 840.777241,2246.94338 C843.474592,2246.95127 845.789704,2248.03549 847.341321,2249.79451 L847.655586,2250.10133 L847.997434,2250.4772 L848.00236,2250.47424 L848.236826,2250.72976 L848.619066,2250.56698 C848.690982,2250.53639 848.787527,2250.48707 848.902791,2250.41801 C849.013128,2250.35191 849.114599,2250.28482 849.214099,2250.21182 C849.512601,2249.99281 849.66727,2249.76097 849.685003,2249.5015 C849.70175,2249.26473 849.617027,2249.03684 849.440685,2248.84545 M840.773004,2257.89281 C840.031184,2257.95003 839.055881,2257.18841 839.083465,2256.1476 C839.110065,2255.1502 839.908039,2254.43791 840.807485,2254.44284 C841.788698,2254.44876 842.533475,2255.22912 842.530519,2256.1989 C842.528549,2257.12034 841.714812,2257.9303 840.773004,2257.89281" id="WiFi-icon"></path>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <div class="c-device__name">
                    Mercedes-Benz A200 Hatch FL (W177) ZA
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
    <button type="button" class="btn-cancel" onclick="closeForm()">Close</button>
</div>

<script>
function openForm() {
  document.getElementById("settings-list").style.display = "block";
}
function closeForm() {
  document.getElementById("settings-list").style.display = "none";
}
</script>

  <script  src="./script.js"></script>

</body>
</html>