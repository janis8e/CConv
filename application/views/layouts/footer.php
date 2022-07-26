</main>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<?
$this->assets->outputJs('js_optional');
?>

<script>
    feather.replace({ 'aria-hidden': 'true' })
    if (typeof($.fn.dataTable) != "undefined" && $.fn.dataTable !== null) {
        $.extend($.fn.dataTable.defaults, {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Latvian.json"
            }
        });
    }
</script>

<? if (function_exists('footer_script')) footer_script() ?>

</body>

</html>