<!--start-breadcrumbs-->
<div class="breadcrumbs">
  <div class="container">
    <div class="breadcrumbs-main">
      <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Cart</li>
      </ol>
    </div>
  </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
  <div class="container">
    <div class="prdt-top">
      <div class="col-md-12">
        <div class="product-one cart">
          <div class="register-top heading">
            <h2>Complete your order</h2>
          </div>
          <br><br>
          <?php if(!empty($_SESSION['cart'])):?>
            <div class="table-responsive" id="cart2">
              <table class="table table-hover table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($_SESSION['cart'] as $id => $item): ?>
                  <tr>
                    <td><a href="/product/<?=$item['alias'] ?>"><img src="/images/<?= $item['img'] ?>"></a></td>
                    <td><a href="/product/<?=$item['alias'] ?>"><?=$item['title'] ?></a></td>
                    <td><?=$item['qty'] ?></td>
                    <td><?=$item['price'] ?></td>
                    <td><a href="/cart/delete/?id=<?=$id ?>"><span data-id="<?=$id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                  </tr>
                <?php endforeach;?>
                <tr>
                  <td>Items:</td>
                  <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty'] ?></td>
                </tr>
                <tr>
                  <td>Total price:</td>
                  <td colspan="4" class="text-right cart-sum"><?= $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] ?></td>
                </tr>
                </tbody>
              </table>
            </div>
            <div class="register-main">
              <form method="post" action="/cart/checkout" id="signup" role="form" data-toggle="validator">
                <?php if(!isset($_SESSION['user'])): ?>
                <div class="col-md-6 account-left">
                  <div class="form-group has-feedback">
                    <label for="login" class="control-label">Login*</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="Login" data-minlength="3" data-error="Minimum of 3 characters" value="<?= isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : ''; ?>" required >
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="pasword" class="control-label">Password*</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" data-minlength="6" data-error="Minimum of 6 characters" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="email" class="control-label">Email*</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : ''; ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="firstname" class="control-label">First name*</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First name" value="<?= isset($_SESSION['form_data']['firstname']) ? h($_SESSION['form_data']['firstname']) : ''; ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="lastname" class="control-label">Last name*</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last name" value="<?= isset($_SESSION['form_data']['lastname']) ? h($_SESSION['form_data']['lastname']) : ''; ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="country" class="control-label">Country or region*</label>
                    <select id="country" name="country" placeholder="Country or region" class="form-control" required><option></option><option value="US">United States</option><option value="AA">APO/FPO/DPO</option><option value="CA">Canada</option><option value="GB">United Kingdom</option><option value="AF">Afghanistan</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan Republic</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BR">Brazil</option><option value="VG">British Virgin Islands</option><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde Islands</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CD">Congo, Democratic Republic of the</option><option value="CG">Congo, Republic of the</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Cote d Ivoire (Ivory Coast)</option><option value="HR">Croatia, Republic of</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (Islas Malvinas)</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="GA">Gabon Republic</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IE">Ireland</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KR">Korea, South</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macau</option><option value="MK">Macedonia</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts-Nevis</option><option value="LC">Saint Lucia</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="SM">San Marino</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SR">Suriname</option><option value="SJ">Svalbard</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TG">Togo</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican City State</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="VI">Virgin Islands (U.S.)</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option><option value="WS">Western Samoa</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 5px"></span>
                  </div>
                </div>
                <div class="col-md-6 account-right">
                  <div class="form-group has-feedback">
                    <label for="streetaddress" class="control-label">Street address*</label>
                    <input type="text" name="streetaddress" class="form-control" id="streetaddress" placeholder="Street address" value="<?= isset($_SESSION['form_data']['streetaddress']) ? h($_SESSION['form_data']['streetaddress']) : ''; ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="city" class="control-label">City*</label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?= isset($_SESSION['form_data']['city']) ? h($_SESSION['form_data']['city']) : ''; ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="state" class="control-label">State</label>
                    <input type="text" name="state" class="form-control" id="state" placeholder="State" value="<?= isset($_SESSION['form_data']['state']) ? h($_SESSION['form_data']['state']) : ''; ?>">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="zipcode" class="control-label">ZIP/Postal code*</label>
                    <input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="ZIP/Postal code" value="<?= isset($_SESSION['form_data']['zipcode']) ? h($_SESSION['form_data']['zipcode']) : ''; ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="phone" class="control-label">Phone number*</label>
                    <input type="text" pattern="[0-9-+]{3,20}" name="phone" class="form-control" id="phone" placeholder="Phone number" value="<?= isset($_SESSION['form_data']['phone']) ? h($_SESSION['form_data']['phone']) : ''; ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                </div>
                <?php endif; ?>
                <div class="col-md-12 account-left">
                  <div class="form-group">
                    <label for="note">Note</label>
                    <textarea style="resize:none" name="note" class="form-control"></textarea>
                  </div>
                  <button type="submit" class="btn btn-success">Continue checkout</button>
                </div>
              </form>
              <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
            </div>

          <?php else: ?>
            <h3>Cart is empty.</h3>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>
<!--product-end-->