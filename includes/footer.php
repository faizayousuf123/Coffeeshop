
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js">

  </script>

<script src="/coffeeshop/assets/custom.js"></script>

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