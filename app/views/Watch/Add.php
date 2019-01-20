<!--prdt-starts-->
<div class="prdt">
  <div class="container">
    <div class="prdt-top">
      <div class="col-md-12">
        <div class="product-one login">
          <div class="register-top heading">
            <h2>Watch Add</h2>
          </div>
          <div class="register-main">
            <div class="col-md-6 account-left">
              <form method="post" action="/watch/addto" id="watchadd" role="form" enctype="multipart/form-data">
                <div>
                  <label for="cats">Категория</label>
                  <select name="cats" id="cats">
                    <?php foreach ($cats as $cat) : ?>
                      <option value="<?= $cat->id ?>"><?= $cat->title . ' ' . '(' .$cat->alias . ')' ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div>
                 <label for="brand">ИД бренда</label>
                  <select name="brand" id="brand">
                    <?php foreach ($brand as $bran) : ?>
                      <option value="<?= $bran->id ?>"><?= $bran->title ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div>
                  <label for="title">Название</label>
                  <input type="text" name="title" id="title">
                </div>
                <div>
                  <label for="alias">Алиас</label>
                  <input type="text" name="alias" id="alias">
                </div>
                <div>
                  <label for="content">Контент</label>
                  <textarea name="content"></textarea>
                </div>
                <div>
                  <label for="product_specifications">Спецификации продукта</label>
                  <textarea name="product_specifications">
                    <table border="1" class="table table-striped">
<tr>
  <td>Condition: </td>
  <td>New with tags: A brand-new, unused, unopened,<br/>undamaged item in its original packaging</td>
  <td>Gender: </td>
  <td>Men's</td>
</tr>
<tr>
  <td>Display: </td>
  <td>Analog</td>
  <td>Model: </td>
  <td>Citizen Eco-Drive</td>
</tr>
<tr>
  <td>Movement: </td>
  <td>Quartz</td>
  <td>Brand: </td>
  <td>Citizen</td>
</tr>
<tr>
  <td>Case Size: </td>
  <td>42mm</td>
  <td>Band Type: </td>
  <td>Bracelet/Link Band</td>
</tr>
<tr>
  <td>Band Material: </td>
  <td>Stainless Steel</td>
  <td>Watch Shape: </td>
  <td>Round</td>
</tr>
<tr>
  <td>Features: </td>
  <td>12-Hour Dial, Date Indicator, Mineral Crystal</td>
  <td>Case Color: </td>
  <td>Silver</td>
</tr>
<tr>
  <td>Face Color: </td>
  <td>Blue</td>
  <td>Band Color: </td>
  <td>Silver</td>
</tr>
<tr>
  <td>Water Resistance: </td>
  <td>100 Metres / 10 ATM</td>
  <td>Case Material: </td>
  <td>Stainless Steel</td>
</tr>
</table>
                  </textarea>
                </div>
                <div>
                  <label for="price">Цена</label>
                  <input type="text" name="price" id="price">
                </div>
                <div>
                  <label for="old_price">Старая цена</label>
                  <input type="text" name="old_price" id="old_price">
                </div>
                <div>
                  <label for="keywords">Keyword</label>
                  <input type="text" name="keywords" id="keywords">
                </div>
                <div>
                  <label for="description">Description</label>
                  <input type="text" name="description" id="description">
                </div>
                <div>
                  Главное изображение<br/>
                  <input type="file" name="img"/>
                </div>
                <div>
                  3 картинки для галереи<br/>
                  <input type="file" name="gallery1"/>
                  <input type="file" name="gallery2"/>
                  <input type="file" name="gallery3"/>
                </div>
                <div>
                  Атрибуты для фильтра<br/>
                    <?php foreach ($attrs as $attr) : ?>
                      <input type="checkbox" multiple name="attrs[]" value="<?= $attr->id ?>"><?= $attr->value ?><br/>
                    <?php endforeach; ?>
                </div>
                <button type="submit" class="btn btn-success">Добавить часы</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--product-end-->