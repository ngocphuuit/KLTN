                    <div class="progress">
                        <div class="progress-bar progress-bar-success" style="width: {{ $votes['good_percent'] }}%" data-toggle="tooltip" title="{{ $votes['good_votes'] }}"></div>
                        <div class="progress-bar progress-bar-danger" style="width: {{ $votes['bad_percent'] }}%" data-toggle="tooltip" title="{{ $votes['bad_votes'] }}"></div>
                    </div>