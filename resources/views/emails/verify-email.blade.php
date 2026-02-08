<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifique seu E-mail - EBD Digital</title>
    <style>
        /* Reset básico para clientes de e-mail */
        body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        img {
            border: 0;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a img {
            border: none;
        }
    </style>
</head>

<body style="margin: 0; padding: 0; background-color: #f1f5f9; font-family: 'Segoe UI', Helvetica, Arial, sans-serif;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f1f5f9; padding: 40px 0;">
        <tr>
            <td align="center">

                <table border="0" cellpadding="0" cellspacing="0" width="600" style="max-width: 600px;">
                    <tr>
                        <td align="center" style="padding-bottom: 30px;">
                            <a href="{{ config('app.url') }}"
                                style="text-decoration: none; font-size: 28px; font-weight: 800; color: #1e293b; font-family: sans-serif;">
                                EBD <span style="color: #4f46e5;">Digital</span>
                            </a>
                        </td>
                    </tr>
                </table>

                <table border="0" cellpadding="0" cellspacing="0" width="600"
                    style="max-width: 600px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">

                    <tr>
                        <td height="6" style="background-color: #4f46e5;"></td>
                    </tr>

                    <tr>
                        <td style="padding: 40px;">
                            <h1 style="margin: 0 0 20px 0; color: #1e293b; font-size: 24px; font-weight: 700;">
                                Olá, {{ $user->name }}!
                            </h1>

                            <p style="margin: 0 0 24px 0; color: #475569; font-size: 16px; line-height: 1.6;">
                                Estamos muito felizes em ter você na <strong>EBD Digital</strong>. Para garantir a
                                segurança da sua conta e liberar seu acesso ao painel, precisamos apenas que você
                                confirme seu endereço de e-mail clicando no botão abaixo.
                            </p>

                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" style="padding: 10px 0 30px 0;">
                                        <a href="{{ $url }}" target="_blank"
                                            style="display: inline-block; padding: 16px 32px; background-color: #4f46e5; color: #ffffff; text-decoration: none; font-weight: bold; font-size: 16px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.4);">
                                            Confirmar meu E-mail
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin: 0; color: #94a3b8; font-size: 14px; line-height: 1.5;">
                                Se você não criou uma conta na EBD Digital, nenhuma ação é necessária. Pode apenas
                                ignorar este e-mail.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="background-color: #f8fafc; padding: 20px 40px; border-top: 1px solid #e2e8f0;">
                            <p style="margin: 0; color: #64748b; font-size: 13px; text-align: center;">
                                Atenciosamente,<br>
                                <strong>Equipe EBD Digital</strong>
                            </p>
                        </td>
                    </tr>
                </table>

                <table border="0" cellpadding="0" cellspacing="0" width="600"
                    style="max-width: 600px; margin-top: 30px;">
                    <tr>
                        <td style="text-align: center; color: #94a3b8; font-size: 12px; padding: 0 20px;">
                            <p style="margin: 0 0 10px 0;">
                                Está com problemas para clicar no botão? Copie e cole o link abaixo no seu navegador:
                            </p>
                            <p style="margin: 0; word-break: break-all;">
                                <a href="{{ $url }}"
                                    style="color: #4f46e5; text-decoration: underline;">{{ $url }}</a>
                            </p>
                            <p style="margin-top: 20px;">
                                &copy; {{ date('Y') }} EBD Digital. Todos os direitos reservados.
                            </p>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</body>

</html>
