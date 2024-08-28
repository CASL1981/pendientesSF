<x-app-layout :assets="$assets ?? []">
    <div class="row">
       <div class="col-md-12 col-lg-12">
          <div class="row row-cols-1">
             <div class="d-slider1 overflow-hidden ">
                <ul  class="swiper-wrapper list-inline m-0 p-0 mb-2">
                   <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                      <div class="card-body">
                         <div class="progress-widget">
                            <div id="circle-progress-01" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                               <svg class="card-slie-arrow " width="24" height="24px" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                               </svg>
                            </div>
                            <div class="progress-detail">
                               <p  class="mb-2">Total Sales</p>
                               <h4 class="counter" style="visibility: visible;">$560K</h4>
                            </div>
                         </div>
                      </div>
                   </li>
                   <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                      <div class="card-body">
                         <div class="progress-widget">
                            <div id="circle-progress-02" class="circle-progress-01 circle-progress circle-progress-info text-center" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                               <svg class="card-slie-arrow " width="24" height="24" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                               </svg>
                            </div>
                            <div class="progress-detail">
                               <p  class="mb-2">Total Profit</p>
                               <h4 class="counter">$185K</h4>
                            </div>
                         </div>
                      </div>
                   </li>
                   <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                      <div class="card-body">
                         <div class="progress-widget">
                            <div id="circle-progress-03" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                               <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                               </svg>
                            </div>
                            <div class="progress-detail">
                               <p  class="mb-2">Total Cost</p>
                               <h4 class="counter">$375K</h4>
                            </div>
                         </div>
                      </div>
                   </li>
                   <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                      <div class="card-body">
                         <div class="progress-widget">
                            <div id="circle-progress-04" class="circle-progress-01 circle-progress circle-progress-info text-center" data-min-value="0" data-max-value="100" data-value="60" data-type="percent">
                               <svg class="card-slie-arrow " width="24px" height="24px" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                               </svg>
                            </div>
                            <div class="progress-detail">
                               <p  class="mb-2">Revenue</p>
                               <h4 class="counter">$742K</h4>
                            </div>
                         </div>
                      </div>
                   </li>
                   <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                      <div class="card-body">
                         <div class="progress-widget">
                            <div id="circle-progress-05" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="50" data-type="percent">
                               <svg class="card-slie-arrow " width="24px" height="24px" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                               </svg>
                            </div>
                            <div class="progress-detail">
                               <p  class="mb-2">Net Income</p>
                               <h4 class="counter">$150K</h4>
                            </div>
                         </div>
                      </div>
                   </li>
                   <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                      <div class="card-body">
                         <div class="progress-widget">
                            <div id="circle-progress-06" class="circle-progress-01 circle-progress circle-progress-info text-center" data-min-value="0" data-max-value="100" data-value="40" data-type="percent">
                               <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                               </svg>
                            </div>
                            <div class="progress-detail">
                               <p  class="mb-2">Today</p>
                               <h4 class="counter">$4600</h4>
                            </div>
                         </div>
                      </div>
                   </li>
                   <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1300">
                      <div class="card-body">
                         <div class="progress-widget">
                            <div id="circle-progress-07" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="30" data-type="percent">
                               <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                               </svg>
                            </div>
                            <div class="progress-detail">
                               <p  class="mb-2">Members</p>
                               <h4 class="counter">11.2M</h4>
                            </div>
                         </div>
                      </div>
                   </li>
                </ul>
                <div class="swiper-button swiper-button-next"></div>
                <div class="swiper-button swiper-button-prev"></div>
             </div>
          </div>
       </div>
    </div>
 </x-app-layout>