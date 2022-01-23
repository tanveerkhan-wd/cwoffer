@php
	use App\Models\Setting;
	$general_setting =Setting::where('text_key','general_setting_email_logo')->first();
    if($general_setting->text_key=='general_setting_email_logo'){
        $setting['email_logo'] = $general_setting->text_value ? $general_setting->text_value : '';
    }
@endphp
<style type="text/css">
	p{margin: 0;}
</style>
<html>
	<head></head>
	<body>
		<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin:0px;padding:0px;width:640px; margin: 0px auto ;">
			<tbody>
				<tr>
					<td align="center" style="width: 640px ; margin: 0px auto ; background-color: #c4cacd;padding: 20px 0;" valign="top" >
						<img src="{{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING').'/'.$setting['email_logo']) }}" style="max-height: 50px;">
					</td>
	       		</tr>
				<tr>
					<td  style="margin-top: 35px;text-align: left;width: 640px;background-size:cover;padding: 20px; font-family: sans-serif;font-size: 16px;">
						{!! nl2br($msg) !!}
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>