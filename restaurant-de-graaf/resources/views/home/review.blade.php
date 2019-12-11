@extends('../layouts.app')

@section('title', 'Schrijf een review | Restaurant de Graaf')

@section('header')

@endsection

@section('content')
    <div class="content container">
        <h1 class="content__heading">Schrijf een review</h1>

        <form method="POST">
            <div class="row reservation__field reservation__field--small">
                <div class="col-md-12">
                    <label for="title">Titel</label>
                </div>
                <div class="col-md-12">
                    <input id="title" name="title" type="text" required class="form-control">
                </div>
            </div>
            <div class="row reservation__field reservation__field--small">
                <div class="col-md-12">
                    <label for="title">Uw review</label>
                </div>
                <div class="col-md-12">
                    <textarea id="title" name="title" type="text" required class="form-control" style="height: 100px"></textarea>
                </div>
            </div>
            <div class="row reservation__field reservation__field--small">
                <div class="col-md-12">
                    <label style="margin: 0 auto; display: table;">Met hoe veel sterren zou u ons beoordelen?</label>
                </div>
                <div class="col-md-12">
                    <input id="stars" name="title" type="number" hidden min="0" max="5" required class="form-control">

                    <div class="stars">
                        <i class="far fa-star">
                            <span class="space">
                                <span class="half half--first" id="toggleStars" data-value="0.5"></span>
                                <span class="half half--last" id="toggleStars" data-value="1"></span>
                            </span>
                        </i>
                        <i class="far fa-star">
                            <span class="space">
                                <span class="half half--first" id="toggleStars" data-value="1.5"></span>
                                <span class="half half--last" id="toggleStars" data-value="2"></span>
                            </span>
                        </i>
                        <i class="far fa-star">
                            <span class="space">
                                <span class="half half--first" id="toggleStars" data-value="2.5"></span>
                                <span class="half half--last" id="toggleStars" data-value="3"></span>
                            </span>
                        </i>
                        <i class="far fa-star">
                            <span class="space">
                                <span class="half half--first" id="toggleStars" data-value="3.5"></span>
                                <span class="half half--last" id="toggleStars" data-value="4"></span>
                            </span>
                        </i>
                        <i class="far fa-star">
                            <span class="space">
                                <span class="half half--first" id="toggleStars" data-value="4.5"></span>
                                <span class="half half--last" id="toggleStars" data-value="5"></span>
                            </span>
                        </i>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
