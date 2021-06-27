<template>
    <div>
        <fieldset>
          <div class="row fieldsetrow">
              <div class="col-md-9">
                  <div class="stepForm">
                      <h2 class="largeFont">ما الخدمة التي يقدمها مشروعك؟</h2>

                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc1" value="توصيل الطعام" checked="checked">
                          <label class="form-check-label" for="project_service_desc1">توصيل الطعام</label>
                      </div>

                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc2" value="التجارة الإلكترونية">
                          <label class="form-check-label" for="project_service_desc2">التجارة الإلكترونية</label>
                      </div>

                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc3" value="التعلم الإلكتروني">
                          <label class="form-check-label" for="project_service_desc3">التعلم الإلكتروني</label>
                      </div>

                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc4" value="التكنولوجيا المالي">
                          <label class="form-check-label" for="project_service_desc4">التكنولوجيا المالي</label>
                      </div>

                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc5" value="الأخبار الإلكترونية">
                          <label class="form-check-label" for="project_service_desc5">الأخبار الإلكترونية</label>
                      </div>

                      <div class="form-check mt-3">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc6" value="اخر">
                          <label class="form-check-label" for="project_service_desc6">اخر</label>
                      </div>

                      <div class="form-group ">
                          <textarea class="form-control" name="project_service_desc"
                              rows="3" placeholder="اكتب الخدمة"></textarea>
                      </div>

                  </div>
              </div>
              <div class="col-md-3 leftSide">
                  <div class="text-center">
                      <img src="/images/squad.svg" class="img-fluid mb-4" alt="" />
                  </div>

                  <h4>
                      سكواد ابتكار
                  </h4>
                  <p>
                      فريق تقني خبير, متعدد التخصصات , موجه لهدف و اتجاه مخصص لخدمة كل من
                      يطمح لتنفيذ مشروع
                      ليصل إلي عدد أكبر و جمهور أوسع

                  </p>

              </div><!-- leftside end-->

          </div>

          <input type="button" name="next" class="next action-button" value=" التالي">

        </fieldset>

        <fieldset>
            <div class="row fieldsetrow">
                <div class="col-md-9">
                    <div class="stepForm">
                        <h2 class="largeFont"> ما التكنولوجيا التي يحتاجها مشروعك؟ </h2>
                        <div class="form-group ">
                            <input class="form-control" type="text" placeholder="التكونولوجيا ( مثال جافا، تصميم، برمجة )" value="java React Angular" 
                                name="project_technology" />
                        </div>

                        <div class="selectedItems">
                            <ul>
                                <li>java<i data-feather="x"></i></li>
                                <li>React<i data-feather="x"></i></li>
                                <li>Angular<i data-feather="x"></i></li>
                            </ul>
                        </div><!-- selectedItems end -->


                        <div class="unselectedItems mt-5">

                            <p class="mb-0">الاكتر استخدام</p>

                            <ul>
                                <li><i data-feather="plus"></i>Node.js</li>
                                <li class="selected"><i data-feather="plus"></i>Angular</li>
                                <li><i data-feather="plus"></i>iOS</li>
                                <li><i data-feather="plus"></i>Android</li>
                                <li class="selected"><i data-feather="plus"></i>React</li>
                                <li><i data-feather="plus"></i>Ruby on Rails</li>
                                <li><i data-feather="plus"></i>Python</li>
                                <li class="selected"><i data-feather="plus"></i>Java</li>
                                <li><i data-feather="plus"></i>React Native</li>
                                <li><i data-feather="plus"></i>UI/UX Design</li>
                                <li><i data-feather="plus"></i>Scala</li>
                                <li><i data-feather="plus"></i>C#</li>
                                <li><i data-feather="plus"></i>C++</li>
                                <li><i data-feather="plus"></i>Server Hosting</li>
                            </ul>
                        </div><!-- selectedItems end -->


                    </div>
                </div>
                <div class="col-md-3 leftSide">

                    <div class="testimonialsBox">
                        <img src="/images/pinkquote.svg" class="mb-2" />
                        <p>
                            ساعدتنا ابتكار في بناء فريق تقني متكامل ومتعاون معنا في وقت قياسي
                        </p>

                        <div class="text-right">
                            <h6>
                                محمد إبراهيم
                            </h6>
                            <span>
                                المؤسس والرئيس التنفيذي -صبار
                            </span>
                        </div>

                    </div>

                    <div class="testimonialsBox">
                        <img src="/images/bluequote.svg" class="mb-2" />
                        <p>
                            طور سكواد ابتكار جريدة سبق بتطبيقات غير مسبوقة, فخور بشراكتنا
                        </p>

                        <div class="text-right">
                            <h6>
                                علي الحازمي
                            </h6>
                            <span>
                                رئيس تحرير صحيفة سبق الإلكترونية
                            </span>
                        </div>

                    </div>


                    <div class="testimonialsBox">
                        <img src="/images/orangequote.svg" class="mb-2" />
                        <p>
                            استطعت القيام بدوري والتركيز على الأعمال التشغيلية بعد أن تولت
                            ابتكار الجانب التقني من حصيل كليا
                        </p>

                        <div class="text-right">
                            <h6>
                                سلطان الهداب

                            </h6>
                            <span>
                                المدير تنفيذي-حصيل
                            </span>
                        </div>

                    </div>

                </div><!-- leftside end-->

            </div>


            <input type="button" name="previous" class="previous action-button" value="السابق" />
            <input type="button" name="next" class="next action-button" value="التالى" />

        </fieldset>

        <fieldset>
            <div class="row fieldsetrow">
                <div class="col-md-9">
                    <div class="stepForm">
                        <h2 class="largeFont">ماذا سيكون حجم سكوادك؟</h2>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="squad_size"
                                id="squad_size1" value="3 - 5" checked>
                            <label class="form-check-label" for="squad_size1">3 - 5</label>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="squad_size"
                                id="squad_size2" value="5 - 8">
                            <label class="form-check-label" for="squad_size2">5 - 8</label>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="squad_size"
                                id="squad_size3" value="+ 8">
                            <label class="form-check-label" for="squad_size3">+ 8</label>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="squad_size"
                                id="squad_size4" value="لا أعلم">
                            <label class="form-check-label" for="squad_size4">لا أعلم</label>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 leftSide">
                    <div class="row leftLogos">
                        <div class="col-6">
                            <div class="logobox">
                                <img src="/images/logos/1.png" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="logobox">
                                <img src="/images/logos/2.png" class="img-fluid" />
                            </div>
                        </div>

                    </div>

                    <div class="row leftLogos">
                        <div class="col-6">
                            <div class="logobox">
                                <img src="/images/logos/5.png" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="logobox">
                                <img src="/images/logos/9.png" class="img-fluid" />
                            </div>
                        </div>

                    </div>


                    <div class="row leftLogos">
                        <div class="col-6">
                            <div class="logobox">
                                <img src="/images/logos/13.png" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="logobox">
                                <img src="/images/logos/14.png" class="img-fluid" />
                            </div>
                        </div>

                    </div>

                    <h4>
                        سكواد ابتكار
                    </h4>

                    <p>
                        استقطبنا مجموعة من أكثر الشركات الناشئة نجاحاً في المملكة والمؤسسات
                        المرموقة التي أعجبت بمضمون وقيمة سكواد وحصلت على فرقها التقنية المدارة
                        بالكامل من خلالنا
                    </p>
                </div><!-- leftside end-->

            </div>

            <input type="button" name="previous" class="previous action-button" value="السابق" />
            <input type="button" name="next" class="next action-button" value="التالى" />

        </fieldset>

        <fieldset>
            <div class="row fieldsetrow">
                <div class="col-md-9">
                    <div class="stepForm">
                        <h2 class="largeFont">ما حالة مشروعك؟ </h2>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="project_status"
                                id="project_status1" value="سأكمل تطوير مشروعي" checked>
                            <label class="form-check-label" for="project_status1">سأكمل تطوير مشروعي</label>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="project_status"
                                id="project_status2" value="سأبدأ مشروع جديد">
                            <label class="form-check-label" for="project_status2">سأبدأ مشروع جديد</label>
                        </div>


                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="project_status"
                                id="project_status3" value="اخر">
                            <label class="form-check-label" for="project_status3">اخر</label>
                        </div>

                        <div class="form-group ">
                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                rows="3" placeholder="اكتب الخدمة"></textarea>
                        </div>

                    </div>
                </div>
                <div class="col-md-3 leftSide">


                    <h4>
                        سكواد ابتكار هو شريكك التقني بمعنى الكلمة
                    </h4>

                    <div class="text-center">
                        <img src="/images/squodTeam.svg" class="img-fluid mb-4" alt="">
                    </div>

                    <ul class="checkListUl">
                        <li>
                            <i data-feather="check"></i> إشراف كامل على فريقك
                        </li>

                        <li>
                            <i data-feather="check"></i> اختبارات جودة بمستويات عالمية
                        </li>

                        <li>
                            <i data-feather="check"></i> أحدث تقنيات البرمجة والتصميم
                        </li>



                        <li>
                            <i data-feather="check"></i> تخطيط دوري للمهام
                            تقارير مفصلة عن ما تم إنجازه
                        </li>


                        <li>
                            <i data-feather="check"></i> تقارير مفصلة عن ما تم إنجازه

                        </li>
                    </ul>
                </div><!-- leftside end-->

            </div>

            <input type="button" name="previous" class="previous action-button" value="السابق" />
            <input type="submit" name="next" class="next action-button" value="التالى" />

        </fieldset>
    </div>
</template>

<script>
    export default {
        // props: ['lessonId', 'compeletedLesson'],        
        mounted() {
            console.log('Component mounted.');
        },
        data: function(){
            return {
                status: this.compeletedLesson,
            }
        },
        methods: {
            // compeleteLesson(){
            //     axios.post('/compeletelesson/' + this.lessonId)
            //     .then(response => {
            //         this.status = ! this.status;
            //     })
            //     .catch(errors => {
            //         if (errors.response.status == 401) {
            //             window.location = '/login';
            //         }
            //     });
            // }
        },
        computed: {
            // buttonText(){
            //     return (this.status) ? 'UnMark this lesson as Compeleted' : 'Compelete this lesson';
            // }
        }
    }
</script>
