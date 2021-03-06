@include('templates/nav')
<!-- Content -->
<section id="content">

	<div  class="hillfe-content">
		<div class="container">
			<div class="row">

				<div class="col-md-3 col-sm-4">
					<div class="filter">
						<h2>Filter</h2>
						<div class="filter-content">
							<form action="" class="clearfix">

								<h2>Küche</h2>
								<span ng-repeat="kitchen in kitchens">
									<label class="checkbox-inline kitchen">
										<input type="checkbox" ng-click="includeKitchen(kitchen.name)"><% kitchen.name %>
									</label>
								</span>


								<h3>Anlassgrösse</h3>
								<div class="" data-toggle="buttons-checkbox">
									<button class="btn" type="submit" ng-click="setPeoplesCount('group2')">
										<i class="fa fa-user-times" aria-hidden="true"></i>1-5
									</button>
									<button class="btn" type="submit" ng-click="setPeoplesCount('group3')">
										<i class="fa fa-user-times" aria-hidden="true"></i>6-10
									</button>
									<button class="btn" type="submit" ng-click="setPeoplesCount('group4')">
										<i class="fa fa-user-times" aria-hidden="true"></i>11-X
									</button>
								</div>

								<h3>Lieferdatum</h3>
								<div {{--class="lieferdatum"--}}>
									{{-- <input type="datetime" id="datetimepicker4" ng-model="" ng-change="setTime()">--}}
									<div class="dropdown">
										<a class="dropdown-toggle" id="dropdown2"  role="button" data-toggle="dropdown" data-target="#" >
											<input type="text" class="form-control" data-ng-model="delivery_time">
										</a>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
											<datetimepicker data-ng-model="delivery_time" data-datetimepicker-config="{ dropdownSelector: '#dropdown2' }"/>
										</ul>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>

				<div class="col-md-9 col-sm-8">

					<div class="apero-anbieter clearfix">

						<h1>Apero - Anbieter in 9000 St. Gallin</h1>

						<div  class="col-md-12 anbieter-item" ng-repeat="caterer in caterers | filter:kitchenFilter | filter:cookingTimeFilter ">
							<div class="col-md-6">
								<div class="anbieter-img">
									<img ng-if="caterer.avatar != '' " ng-src="../images/caterers/<% caterer.avatar %>" alt="">
									<img ng-if="caterer.avatar == '' " ng-src="../images/no_caterer.png" alt="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="anbieter-adres">
									<div class="anbiter-name">
										<% caterer.company %> - Apero Caterer
									</div>
									<div class="anbiter-place">
										<% caterer.city %>,  <% caterer.address %>
									</div>
								</div>
								<div class="ratings">
									<fieldset class="rating">
										<input type="radio" id="star-1-5" name="rating" value="5">
										<label class="full" for="star-1-5" title="Awesome - 5 stars"></label>
										<input type="radio" id="star-1-4half" name="rating" value="4 and a half">
										<input type="radio" id="star-1-4" name="rating" value="4">
										<label class="full" for="star-1-4" title="Pretty good - 4 stars"></label>
										<input type="radio" id="star-1-3half" name="rating" value="3 and a half">
										<input type="radio" id="star-1-3" name="rating" value="3">
										<label class="full" for="star-1-3" title="Meh - 3 stars"></label>
										<input type="radio" id="star-1-2half" name="rating" value="2 and a half">
										<input type="radio" id="star-1-2" name="rating" value="2">
										<label class="full" for="star-1-2" title="Kinda bad - 2 stars"></label>
										<input type="radio" id="star-1-1half" name="rating" value="1 and a half">
										<input type="radio" id="star-1-1" name="rating" value="1">
										<label class="full" for="star-1-1" title="Sucks big time - 1 star"></label>
										<input type="radio" id="starha-1-lf" name="rating" value="half">
									</fieldset>
								</div>
								<div class="anbieter-filter">
									<div class="anbieter-filter-btn" data-toggle="buttons-checkbox">
										<button class="btn" type="submit"><i class="fa fa-user-times" aria-hidden="true"></i>1-5</button>
										<button class="btn" type="submit"><i class="fa fa-user-times" aria-hidden="true"></i>6-10</button>
										<button class="btn" type="submit"><i class="fa fa-user-times" aria-hidden="true"></i>11-X</button>
									</div>
									<a ng-href="/#/caterer/show/<% caterer.id %>">Bestellen</a>
								</div>
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>

</section>
<!-- End Content -->
ng-include