<div class="modal-header">
    <h3 class="modal-title">I'm a modal!</h3>
</div>
<div class="modal-body">
    <ul>
        <li ng-repeat="item in items">
            {{--<a href="#" ng-click="$event.preventDefault(); selected.item = item">{{ item }}</a>--}}
        </li>
    </ul>
    {{--Selected: <b>{{ selected.item }}</b>--}}
</div>
<div class="modal-footer">
    <button class="btn btn-primary" type="button" ng-click="ok()">OK</button>
    <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
</div>