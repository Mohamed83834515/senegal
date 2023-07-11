@extends('dashboard.layouts.invoice', ['title' => 'Bienvenue'])

@section('content')
<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img width="200" src="{{ asset('inter/img/logo-lagareshop.jpeg') }}" alt="Company logo" style="max-width: 300px" />
                        </td>

                        <td>
                            Commande #: {{ $vente->numero_cmd }}<br />
                            Crée le: {{ $vente->created_at->format('d/m/Y à H:i:s') }}
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
                            LAGARESHOP<br />
                            BACODJICORONI GOLF
                        </td>

                        <td>
                            {{ $vente->partenaire->libelle_ptn }}<br />
                            {{ $vente->partenaire->telephone_ptn }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <h4>Recapitulatif des articles commandés</h4>

    <table>
        {{-- <tr class="heading">
            <td>Payment Method</td>

            <td>Check #</td>
        </tr>

        <tr class="details">
            <td>Check</td>

            <td>1000</td>
        </tr> --}}

        <tr class="heading">
            <td>Produit</td>
            <td>Qté</td>
            <td>Prix unitaire</td>
            <td>Total</td>
        </tr>

        @foreach ($vente->produitCommandes as $produitApp)
        <tr class="details">
            <td>{{ $produitApp->produit->libelle_pro }}</td>
            <td>{{ $produitApp->quantite_pcm }}</td>
            <td>{{ number_format($produitApp->prix_pcm, 2, ',', ' ') }}</td>
            <td>{{ number_format($produitApp->quantite_pcm*$produitApp->prix_pcm, 2, ',', ' ') }}</td>
        </tr>
        @endforeach

        <tr class="total">
            <td></td>
            <td></td>

            <td colspan="2" align="right">Total: {{ number_format($vente->montant_cmd, 2, ',', ' ') }} F CFA</td>
        </tr>

        <tr>
            <td></td>
            <td></td>

            <td colspan="2" align="right">Avance : {{ number_format(($vente->montant_payer_cmd), 2, ',', ' ') }} F CFA</td>
        </tr>

        <tr>
            <td></td>
            <td></td>

            <td colspan="2" align="right">
                <span>Reste à payer : </span>
                <span class="text-bold text-red">{{ number_format(($vente->montant_cmd-$vente->montant_payer_cmd), 2, ',', ' ') }} F CFA</span>
            </td>
        </tr>
    </table>
</div>
@endsection
