<section class="section section-pd bg-light-grey t-center">
    <div class="wrap">
        <h2>Заявка</h2>
        <form  id="form" class="row-w">
            <div class="col-6 col-md">
                <label class="label-text">
                    <input placeholder="ВВЕДІТЬ ІМ'Я" name="first-name" type="text" class="input-text">
                        <span class="label-placeholder">ІМ'Я</span>
                        <span class="label-line"></span>
                        <span class="sign-text">
                            <svg class="icon">
                                <use  xlink:href="#error">
                                    <svg id="error" viewBox="0 0 45 45">
                                        <g>
                                            <path d="M20.5,28.5h4v4h-4Zm0-16h4v12h-4Zm1.98-10a20,20,0,1,0,20.02,20A19.99,19.99,0,0,0,22.48,2.5Zm.02,36a16,16,0,1,1,16-16A16,16,0,0,1,22.5,38.5Z"></path>
                                        </g>
	                                </svg>
                                </use>
                            </svg>
                        </span>
                </label>
            </div>
            <div class="col-6 col-md">
                <label class="label-text">
                    <input placeholder="Прізвище" name="last-name" type="text" class="input-text" required pattern="\D[^0-9]{2,}">
                    <span  class="label-placeholder">Прізвище</span>
                    <span class="label-line"></span>
                    <span class="sign-text">
                        <svg class="icon">
                               <use  xlink:href="#error">
                                    <svg id="error" viewBox="0 0 45 45">
                                        <g>
                                            <path d="M20.5,28.5h4v4h-4Zm0-16h4v12h-4Zm1.98-10a20,20,0,1,0,20.02,20A19.99,19.99,0,0,0,22.48,2.5Zm.02,36a16,16,0,1,1,16-16A16,16,0,0,1,22.5,38.5Z"></path>
                                        </g>
	                                </svg>
                                </use>
                            </svg>
                    </span>
                </label>
            </div>
            <div class="col-6 col-md">
                <label class="label-text">
                    <input placeholder="Посада" name="position" type="text" class="input-text">
                    <span class="label-placeholder">Посада</span>
                    <span class="label-line"></span>
                    <span class="sign-text">
                            <svg class="icon">
                                <use  xlink:href="#error">
                                    <svg id="error" viewBox="0 0 45 45">
                                        <g>
                                            <path d="M20.5,28.5h4v4h-4Zm0-16h4v12h-4Zm1.98-10a20,20,0,1,0,20.02,20A19.99,19.99,0,0,0,22.48,2.5Zm.02,36a16,16,0,1,1,16-16A16,16,0,0,1,22.5,38.5Z"></path>
                                        </g>
	                                </svg>
                                </use>
                            </svg>
                        </span>
                </label>
            </div>
            <div class="col-6 col-md">
                <label class="label-text">
                    <input placeholder="Веб сайт" name="web" type="text" class="input-text">
                    <span  class="label-placeholder">Веб сайт</span>
                    <span class="label-line"></span>
                    <span class="sign-text">
                        <svg class="icon">
                                <use  xlink:href="#error">
                                    <svg id="error" viewBox="0 0 45 45">
                                        <g>
                                            <path d="M20.5,28.5h4v4h-4Zm0-16h4v12h-4Zm1.98-10a20,20,0,1,0,20.02,20A19.99,19.99,0,0,0,22.48,2.5Zm.02,36a16,16,0,1,1,16-16A16,16,0,0,1,22.5,38.5Z"></path>
                                        </g>
	                                </svg>
                                </use>
                        </svg>
                    </span>
                </label>
            </div>
            <div class="col col-md mb-20">
                <label class="label-text full" minlength="50">
                    <textarea name="comment" maxlength="3000" class="input-text" required pattern="\D{10,}"></textarea>
                    <span class="label-placeholder">Коментар</span>
                    <span class="label-line"></span>
                    <span class="sign-text">
                        <svg class="icon">
                                 <use  xlink:href="#error">
                                    <svg id="error" viewBox="0 0 45 45">
                                        <g>
                                            <path d="M20.5,28.5h4v4h-4Zm0-16h4v12h-4Zm1.98-10a20,20,0,1,0,20.02,20A19.99,19.99,0,0,0,22.48,2.5Zm.02,36a16,16,0,1,1,16-16A16,16,0,0,1,22.5,38.5Z"></path>
                                        </g>
	                                </svg>
                                </use>
                        </svg>
                </label>
            </div>
            <div class="col col-md">
                <button type="submit" class="btn d-block btn-form" data-country="">Відправити</button>
            </div>
        </form>
    </div>
    <div id="notification" class="notification">
        <button class="btn-close btn-tr">
            <svg class="icon">
                <use xlink:href="#close"></use>
                <svg id="close" viewBox="0 0 612 612">
                    <g>
                        <polygon points="612,36.004 576.521,0.603 306,270.608 35.478,0.603 0,36.004 270.522,306.011 0,575.997 35.478,611.397      306,341.411 576.521,611.397 612,575.997 341.459,306.011    "></polygon>
                    </g>
                </svg>
            </svg>
        </button>
        <div class="notification-header">
            <span class="notification-icon">
                <svg class="icon info-icon">
                    <use xlink:href="#flame">
                        <svg id="flame" viewBox="0 0 35 35">
                            <g>
                                <path d="M16.873,19.192a3.53,3.53,0,0,0-3.165,3.515,3.574,3.574,0,0,0,3.631,3.529,5.409,5.409,0,0,0,5.41-5.41,15.343,15.343,0,0,0-.671-4.55A8.631,8.631,0,0,1,16.873,19.192ZM19.688.977a31.344,31.344,0,0,1,1.079,7c0,3-1.969,5.44-4.973,5.44A5.308,5.308,0,0,1,10.5,7.977l.044-.525a20.079,20.079,0,0,0-4.71,12.965,11.667,11.667,0,1,0,23.333,0A24.959,24.959,0,0,0,19.688.977ZM17.5,29.167a8.757,8.757,0,0,1-8.75-8.75A17.331,17.331,0,0,1,10,13.956a8.141,8.141,0,0,0,5.79,2.377,7.79,7.79,0,0,0,7.7-6.46A21.541,21.541,0,0,1,26.25,20.417,8.757,8.757,0,0,1,17.5,29.167Z"></path>
                            </g>
                        </svg>
                    </use>
                </svg>
                <svg class="icon success-icon">
                    <use xlink:href="#check-circle">
                        <svg id="check-circle" viewBox="0 0 512 512">
                            <g>
                                <g>
                                    <path d="M437.019,74.98C388.667,26.629,324.38,0,256,0C187.619,0,123.331,26.629,74.98,74.98C26.628,123.332,0,187.62,0,256    s26.628,132.667,74.98,181.019C123.332,485.371,187.619,512,256,512c68.38,0,132.667-26.629,181.019-74.981    C485.371,388.667,512,324.38,512,256S485.371,123.333,437.019,74.98z M256,482C131.383,482,30,380.617,30,256S131.383,30,256,30    s226,101.383,226,226S380.617,482,256,482z"></path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M378.305,173.859c-5.857-5.856-15.355-5.856-21.212,0.001L224.634,306.319l-69.727-69.727    c-5.857-5.857-15.355-5.857-21.213,0c-5.858,5.857-5.858,15.355,0,21.213l80.333,80.333c2.929,2.929,6.768,4.393,10.606,4.393    c3.838,0,7.678-1.465,10.606-4.393l143.066-143.066C384.163,189.215,384.163,179.717,378.305,173.859z"></path>
                                </g>
                            </g>
                        </svg>
                    </use>
                </svg>
                <svg class="icon error-icon">
                    <use xlink:href="#error-circle">
                        <svg id="error-circle" viewBox="0 0 35 35">
                            <g>
                                <path class="d" d="M17.5,2.917A14.583,14.583,0,1,0,32.083,17.5,14.57,14.57,0,0,0,17.5,2.917Zm0,26.25A11.667,11.667,0,1,1,29.167,17.5,11.682,11.682,0,0,1,17.5,29.167Zm5.235-18.958L17.5,15.444l-5.235-5.235-2.056,2.056L15.444,17.5l-5.235,5.235,2.056,2.056L17.5,19.556l5.235,5.235,2.056-2.056L19.556,17.5l5.235-5.235Z"></path>
                            </g>
                        </svg>
                    </use>
                </svg>
            </span>
            <h3 class="notification-title">
                <span class="notification-content-text-error">Помилка</span>
                <span class="notification-content-text-success"> Увага  </span>
            </h3></div>
        <div class="notification-body"><div class="notification-content">
                <span class="notification-content-text-error">   Щось пішло не так. </span>
                <span class="notification-content-text-success">   Успішно відпавлено. </span>
            </div></div>
    </div>
</section>