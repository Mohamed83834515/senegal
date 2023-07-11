@extends('dashboard.layouts.invoice', ['title' => 'Bienvenue'])

@section('content')
<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img width="200" src="{{ asset('inter/img/reveil-logo.png') }}" alt="Company logo" style="max-width: 300px" />
                        </td>

                        <td>
                            Crée le: {{ $client->created_at->format('d/m/Y à H:i:s') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            Reveil SARL.<br />
                            ADJAME LIBERTE
                        </td>

                        <td>
                            {{ $client->libelle_ptn }}<br />
                            {{ $client->telephone_ptn }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <h4>Recapitulatif des commandes non soldées</h4>

    <table>

        <tr class="heading">
            <td>N°</td>
            <td>Montant</td>
            <td>Montant Restant</td>
            <td>Date création</td>
        </tr>

        @foreach ($commandeNonReglees as $commande)
        <tr class="details">
            <td>{{ $commande->numero_cmd }}</td>
            <td>{{ number_format($commande->montant_cmd, 2, ',', ' ') }}</td>
            <td class="text-bold text-red">{{ number_format($commande->montant_cmd-$commande->montant_payer_cmd, 2, ',', ' ') }}</td>
            <td>{{ $commande->created_at->format('d/m/Y à H:i:s') }}</td>
        </tr>
        @endforeach

        <tr class="total">
            <td></td>
            <td></td>

            <td colspan="2" align="right">Total: {{ number_format($commandeNonReglees->avg(function ($item){
                return (float)$item['montant_cmd'];
            }), 2, ',', ' ') }} F CFA</td>
        </tr>

        <tr>
            <td></td>
            <td></td>

            <td colspan="2" align="right">Avance : {{ number_format($commandeNonReglees->avg(function ($item){
                return (float)$item['montant_payer_cmd'];
            }), 2, ',', ' ') }} F CFA</td>
        </tr>

        <tr>
            <td></td>
            <td></td>

            <td colspan="2" align="right">
                <span>Reste à payer : </span>
                <span class="text-bold text-red">{{ number_format($commandeNonReglees->avg(function ($item){
                    return (float)$item['montant_cmd'] - (float)$item['montant_payer_cmd'];
                }), 2, ',', ' ') }} F CFA</span>
            </td>
        </tr>
    </table>
</div>
@endsection