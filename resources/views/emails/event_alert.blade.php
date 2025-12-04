@component('mail::message')
@if($daysLeft === 0)
# Chegou O DIA! 🎉

O **III Luanda Financing Summit for Africa's Infrastructure Development** começa hoje! Prepare-se para o evento.
@else
# Contagem Regressiva: {{ $daysLeft }} dias

Faltam **{{ $daysLeft }} dias** para o III Luanda Financing Summit for Africa's Infrastructure Development. Não perca!
@endif

Obrigado,<br>
@endcomponent
