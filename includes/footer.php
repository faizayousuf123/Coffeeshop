<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js">

  </script>

  <script>
    <?php if(isset($_SESSION['message'])) {?>
     alertify.set('notifier','position', 'top-right');
     alertify.success('<?=$_SESSION['message']; ?>');
     <?php
     unset ($_SESSION['message']);
     }
     ?>
  </script>
 

</body>
</html>