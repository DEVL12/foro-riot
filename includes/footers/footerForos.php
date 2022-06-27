      <div id="footer">
        <div class="attribute_footer">
          <img src="<?= base_url() ?>assets/images/roundo-darko-logo.png" class="footer_logo"><br>
          <!-- Attribute is required to use this copyright theme designed by Waleed Beituni (Bitoony). Don't want to attribute? You can make a payment at https://bitoony.com for the right to use this theme without attribution  -->
          Theme Designed by <a href="https://bitoony.com" target="_blank">Bitoony</a>, &copy;2021-2022
          <!-- DO NOT remove the attribute above unless granted by the theme creator  -->
          <br>
          Powered by <a href="https://mybb.com" target="_blank" rel="noopener">MyBB</a>, &copy; 2002-2022.
        </div>
      </div>
    </div>
    <script> const base_url = "<?= base_url(); ?>"; </script>
    <?php if(isset($data['script'])){ ?>
    <script src= "<?= base_url()?>assets/js/scripts/<?= $data['script'] ?>" type="module"></script>
    <?php } ?>
  </body>
</html>
<!-- end: index -->
