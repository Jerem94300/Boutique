
</html><!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../calculatrice.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculatrice</title>
  </head>
  <body>
    <div class="container">


      <form action="" class="form">
        <div class="form__item1">
          <label for="number1">Number 1</label>
          <input type="number" id="number1"  class="input__text">
        </div>
        <div class="form__info info__item1 ">Saisir un chiffre</div>

        <div class="form__item2">
          <select name="operate" id="operate" class="input__text__item2">
            <option value="+" class="operator">+</option>
            <option value="-" class="operator">-</option>
            <option value="*" class="operator">*</option>
            <option value="/" class="operator">/</option>
          </select>
        </div>
        <div class="form__info info__item2">Selectionnez  un operateur</div>

    
        <div class="form__item3">
          <label for="number2">Number 2</label>
          <input type="number" id="number2"  class="input__text">
        </div>
        <div class="form__info info__item3">Saisir un chiffre</div>

        <button type="submit" class="button__submit">Calculer</button>
        <div class="form__info info__item3"></div>


        <div class="form__item result__form"></div>

      </form>
    </div>

  </body>
</html>
