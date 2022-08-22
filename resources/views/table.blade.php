<div class="container d-flex justify-content-center">
    <table class="table">
        <tbody>
            @for ($i = 0; $i < count($array); $i++)
                <tr>
                    @for ($j = 0; $j < count($array[$i]); $j++)
                        <td class=" @if($array[$i][$j] == 2) table-warning @elseif ($array[$i][$j] == 3) table-success @elseif ($array[$i][$j] == 1) table-dark @elseif ($array[$i][$j] == 0) table-active @endif ">
                            {{ $array[$i][$j] }}
                        </td>
                    @endfor
                </tr>

            @endfor
          </tbody>
    </table>
</div>
