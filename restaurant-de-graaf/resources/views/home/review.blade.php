@extends('../layouts.app')

@section('title', 'Schrijf een review | Restaurant de Graaf')

@section('header')

@endsection

@section('content')
    <div class="content container">
        <h1 class="content__heading">Schrijf een review</h1>

        <form method="POST">
            @csrf
            @method('POST')
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
                    <label for="text">Uw review</label>
                </div>
                <div class="col-md-12">
                    <textarea id="text" name="text" type="text" required class="form-control" style="height: 100px"></textarea>
                </div>
            </div>
            <div class="row reservation__field reservation__field--small">
                <div class="col-md-12">
                    <label style="margin: 0 auto; display: table;">Met hoe veel sterren zou u ons beoordelen?</label>
                </div>
                <div class="col-md-12">
                    <input id="stars" name="stars" type="number" hidden min="0" max="5" required class="form-control">

                    <div class="stars">
                        <i class="far fa-star" id="star1">
                            <span class="space">
                                <span class="half half--first toggleStars" data-value="0.5"></span>
                                <span class="half half--last toggleStars" data-value="1"></span>
                            </span>
                        </i>
                        <i class="far fa-star" id="star2">
                            <span class="space">
                                <span class="half half--first toggleStars" data-value="1.5"></span>
                                <span class="half half--last toggleStars" data-value="2"></span>
                            </span>
                        </i>
                        <i class="far fa-star" id="star3">
                            <span class="space">
                                <span class="half half--first toggleStars" data-value="2.5"></span>
                                <span class="half half--last toggleStars" data-value="3"></span>
                            </span>
                        </i>
                        <i class="far fa-star" id="star4">
                            <span class="space">
                                <span class="half half--first toggleStars" data-value="3.5"></span>
                                <span class="half half--last toggleStars" data-value="4"></span>
                            </span>
                        </i>
                        <i class="far fa-star" id="star5">
                            <span class="space">
                                <span class="half half--first toggleStars" data-value="4.5"></span>
                                <span class="half half--last toggleStars" data-value="5"></span>
                            </span>
                        </i>
                    </div>
                </div>
            </div>
            <div class="row reservation__field">
                <div class="col-md-12">
                    <div class="buttons">
                        <button class="button button--primary" type="submit">Review toevoegen</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
