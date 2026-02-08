<!DOCTYPE html>
<html>

<body style="font-family: sans-serif; line-height: 1.6; color: #333; background-color: #f9f9f9; padding: 20px;">
    <div
        style="max-width: 600px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h2 style="color: #4f46e5;">Olá, {{ $user->name }}!</h2>
        <p>Seu e-mail foi verificado com sucesso. Agora você tem acesso total ao painel administrativo da <strong>EBD
                Digital</strong>.</p>
        <p>Abaixo estão suas credenciais de acesso:</p>

        <div
            style="background: #f1f5f9; padding: 20px; border-radius: 8px; border-left: 4px solid #4f46e5; margin: 20px 0;">
            <p style="margin: 5px 0;"><strong>Link de Acesso:</strong> <a
                    href="{{ config('app.url') }}">{{ config('app.url') }}</a></p>
            <p style="margin: 5px 0;"><strong>E-mail:</strong> {{ $user->email }}</p>
            <p style="margin: 5px 0;"><strong>Senha Temporária:</strong> <span
                    style="color: #e11d48; font-family: monospace; font-weight: bold;">{{ $password }}</span></p>
        </div>

        <p style="font-size: 13px; color: #64748b;">* Por segurança, recomendamos que você altere sua senha logo após o
            primeiro acesso.</p>
        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 20px 0;">
        <p>Atenciosamente,<br><strong>Equipe EBD Digital</strong></p>
    </div>
</body>

</html>
