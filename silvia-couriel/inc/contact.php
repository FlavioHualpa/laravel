    <?php require 'validate.php'; ?>

    <div class="container">
      <div class="content-box-cont compact">
        <h2><?= lang('contact.title') ?></h2>
        <form method="post">
          <div class="form-field">
            <label for="name"><?= lang('contact.form.name') ?></label>
            <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" class="<?= isset($errors['name']) ? 'form-error' : '' ?>">
            <?php if (isset($errors['name'])) : ?>
            <p class="form-error"><?= lang($errors['name']) ?></p>
            <?php endif ?>
          </div>
          <div class="form-field">
            <label for="email"><?= lang('contact.form.email') ?></label>
            <input type="text" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>" class="<?= isset($errors['email']) ? 'form-error' : '' ?>">
            <?php if (isset($errors['email'])) : ?>
            <p class="form-error"><?= lang($errors['email']) ?></p>
            <?php endif ?>
          </div>
          <div class="form-field">
            <label for="message"><?= lang('contact.form.message') ?></label>
            <textarea rows="6" name="message" id="message" class="<?= isset($errors['message']) ? 'form-error' : '' ?>"><?= $_POST['message'] ?? '' ?></textarea>
            <?php if (isset($errors['message'])) : ?>
            <p class="form-error"><?= lang($errors['message']) ?></p>
            <?php endif ?>
          </div>
          <div class="form-field margin-top">
            <button type="sumbit"><?= lang('contact.form.send') ?></button>
          </div>
        </form>
      </div>
    </div>
