            </div>


            <div class="footer text-center">
            <p> <i class="fab fa-twitter">&copy Tweeter</i></p>


        </div>
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'apiToken' => auth()->user()->api_token ?? null,
                ]) !!};
        </script>
    </body>
</html>
