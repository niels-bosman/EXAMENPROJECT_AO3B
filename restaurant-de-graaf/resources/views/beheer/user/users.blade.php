@extends('layouts.app')

@section('title', 'klantenoverzicht | Restaurant de Graaf')

@section('content')
<div class="beheer container">
    <h1 class="beheer__heading">Klantenoverzicht</h1>

    <table class="table table-hover">
        <tr>
            <th>Naam</th>
            <th>Emailadres</th>
            <th>Telefoonnummer</th>
            <th></th>

        </tr>
        @foreach($users as $user)
        <tr>
            <td><a class="header__menu-item @if($user->blocked == 1) button--block @endif">{{$user->name}}</a></td>
            <td><a class="header__menu-item @if($user->blocked == 1) button--block @endif">{{$user->email}}</a></td>
            <td><a class="header__menu-item @if($user->blocked == 1) button--block @endif">{{$user->tel_number}}</a></td>
            @if($user->id != $auth->id)
            <td>
                <a class="button button--primary" href="klanten/{{$user->id}}"><i class="fas fa-pen"></i></a>
                <a class="button button--danger profiel__remove-account-button" data-id="{{$user->id}}" href="#"><i class="fas fa-trash-alt"></i></a>
                <div class="profiel__remove-modal-background profiel__remove-modal-disable" data-id="{{$user->id}}"></div>
                <form method="post" class="profiel__remove-modal" data-id="{{$user->id}}">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="modal-header">
                        <h5 class="modal-title">Weet je zeker dat je het account van {{$user->name}} wilt opzeggen? Dit kan niet meer terug gezet worden.</h5>
                        <button type="button" class="close profiel__remove-modal-disable">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="profiel__remove-modal-content">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Ik ben geen robot
                                    <input type="checkbox" required>
                                </label>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="button button--danger float-right">Account opzeggen</button>
                            </div>
                        </div>
                    </div>
                </form>
                @if($user->blocked == 0)
                <a class="button button--soft profiel__block-account-button" data-id="{{$user->id}}" href="#"><i class="fas fa-ban"></i></a>
                <div class="profiel__block-modal-background profiel__block-modal-disable" data-id="{{$user->id}}"></div>
                <form method="post" class="profiel__block-modal" data-id="{{$user->id}}">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="modal-header">
                        <h5 class="modal-title">Weet je zeker dat je het account van {{$user->name}} wilt blokkeren?</h5>
                        <button type="button" class="close profiel__block-modal-disable">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="profiel__block-modal-content">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Ik ben geen robot
                                    <input type="checkbox" required>
                                </label>
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <button type="submit" class="button button--primary float-right">Account blokkeren</button>
                            </div>
                        </div>
                    </div>
                </form>
                @else
                    <a class="button button--deblock" href="/beheer/klanten/{{$user->id}}/block"><i class="fas fa-unlock-alt"></i></a>
                @endif
            </td>
            @else
                <td></td>
            @endif
        </tr>
        @endforeach
    </table>
</div>
@endsection

@if(isset($putSuccess))
    @if($putSuccess == true)
        <div class="alert alert-success reservation__alert" role="alert">
            {{$msg}}
            <button type="button" class="close reservation__alert-close">
                <span>&times;</span>
            </button>
        </div>
    @endif
@endif
